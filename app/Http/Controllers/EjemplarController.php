<?php

namespace App\Http\Controllers;

use App\data_field;
use App\Ejemplar;
use App\field;
use App\Http\Controllers\pagesController;
use App\Media;
use App\relation;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EjemplarController extends Controller
{
    // public $notificacion = "";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $notificacion = false, $admin = false)
    {
        $accionGet = new data_field();
        $listEje = $accionGet->getDataField();

        if ($request->ajax()) {
            $filterSex = $request->input('sex');
            $filterName = $request->input('name');
            $filterPagination = $request->input('page');
            $filterColor = $request->input('filterColor');
            $filterRaza = $request->input('raza');
            $perPage = $request->input('perPage');
            $slug = $request->input('slug');
            $admin = $request->input('role');

            $perPage = is_null($perPage) ? 10 : $perPage;
            $nroPage = is_null($filterPagination) ? 1 : $filterPagination;
            $Ejefiltrados = $listEje;

            if ($slug) {
                $Ejefiltrados = $accionGet->filtroArray($listEje, 'slug', $slug, true);
            }

            if ($filterSex) {
                $Ejefiltrados = $accionGet->filtroArray($Ejefiltrados, 'sex', $filterSex);
            }

            if ($filterName) {
                $Ejefiltrados = $accionGet->filtroArray($Ejefiltrados, 'name', $filterName);
            }

            if ($filterColor) {
                $Ejefiltrados = $accionGet->filtroArray($Ejefiltrados, 'color', $filterColor);
            }

            if ($filterRaza) {
                $Ejefiltrados = $accionGet->filtroArray($Ejefiltrados, 'raza', $filterRaza);
            }

            $ejemplares = $accionGet->paginador($Ejefiltrados, $nroPage, $perPage);
            return response()->json(view('public.sublista', compact('ejemplares', 'admin'))->render());
        } else {

            $razas = DB::table('razas')
                ->select('raza')
                ->get();

            $ejemplares = $accionGet->paginador($listEje, null, 10);

            if (strpos(url()->current(), "Ejemplar")) {
                $admin = true;
            }

            return view('admin.ejemplars.ejemplares', compact('ejemplares', 'razas', 'notificacion', 'admin'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        foreach (DB::table('razas')->select('raza')->cursor() as $allRazas) {
            $razas[$allRazas->raza] = $allRazas->raza;
        }

        $columns = field::all();

        // return $columns;
        return view('admin.ejemplars.ejemplar', compact('razas', 'columns'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {

        $datos = [];
        $media = new Media;
        $relation = new relation();
        $ejemplar = new Ejemplar();

        $ejemplar->slug = Str::slug($request['name'], '-') . '-' . rand(1, 99999);
        $ejemplar->save();

        $id = Ejemplar::all()->last()->id;

        $media->saveMedia($request, $id);
        $relation->saveRelations($request, $id);

        // Ciclo for para almacenar los datos
        foreach ($request->request as $key => $value) {
            $idColumn = DB::table('fields')
                ->where('name', $key)
                ->value('id');

            if (!is_null($idColumn)) {
                $item['field_id'] = $idColumn;
                $item['data'] = $value;
                $item['ejemplar_id'] = $id;
                array_push($datos, $item);
            }
        }

        DB::table('data_fields')->insert($datos);

        return redirect('/Ejemplar')->with('status', 'Ejemplar añadido!');

    }

    public function simulator($params)
    {
        $ejemplar = new Ejemplar();
        $family = [];
        $slugs = explode("&", $params);
        foreach ($slugs as $key => $slug) {
            $id = $ejemplar->getIdEjemplar($slug);
            $abuelosP = $this->getGenerations($id);
            $ejemplar = $this->getDetails($slug);

            $foo = $key == 0 ? "Macho" : "Hembra";

            $family[$foo] = $abuelosP;
            $family["Ejemplar " . $foo] = $ejemplar;
        }
        return view('public.arbol', compact('family'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $slug)
    {
        $orden = [];
        $page = new pagesController();
        $datos = new Ejemplar();

        $id = $datos->getIdEjemplar($slug);

        $ejemplar = $datos->getDetails($slug);
        $brothers = $datos->getBrothers($id);
        $hijos = $datos->getChildrens($id);
        $abuelos = $datos->getGenerations($id);

        $details = [
            "Detalles" => $ejemplar,
            "Familiares" =>
            ["Hermanos" => $brothers,
                "Hijos" => $hijos],
        ];

        $page = $page->show($req);
        $ordenCard = $page["orden"];

        foreach ($ordenCard as $key => $value) {
            $name = $value->columnName;
            $valor = $ejemplar[$name];
            $orden[$value->publicName] = $valor;

        }
        return view('public.ejemplar', compact('details', 'abuelos', 'page', 'orden'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $datos = new Ejemplar();
        $id = $datos->getIdEjemplar($slug);
        $padres = $datos->getParents($id);

        // return $padres;
        foreach (DB::table('razas')->select('raza')->cursor() as $allRazas) {
            $razas[$allRazas->raza] = $allRazas->raza;
        }

        $columns = field::all();

        $details = $datos->getDetails($slug);

        return view('admin.ejemplars.editar-ejemplar', compact('details', 'razas', 'columns', 'padres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $datos = [];
        $relation = new Relation();
        $ejemplar = new Ejemplar;
        $media = new Media;

        $id = $ejemplar->getIdEjemplar($id);
        $media->saveMedia($request, $id);

        // Ciclo for para actualizar los datos
        foreach ($request->request as $key => $value) {

            // Actualizar relaciones condicionada para evitar errores
            if ($key == "id_macho" || $key == "id_hembra") {
                if (!is_null($value)) {
                    $type = $key == "id_macho" ? 1 : 2;
                    $idPadre = $ejemplar->getIdEjemplar($value);
                    $relation->updateRelations($type, $idPadre, $id);
                }
            }

            $idColumn = DB::table('fields')
                ->where('name', $key)
                ->value('id');

            /**
             * Actualizar datos condicionado para evitar errores
             * se actualiza de la siguiente manera field_id -> nuevoValor -> ID_Ejemplar
             */
            if (!is_null($idColumn)) {
                data_field::where('field_id', $idColumn)
                    ->where('ejemplar_id', $id)
                    ->update(['data' => $value]);

            }
        }

        return redirect('/Ejemplar')->with('status', 'Ejemplar actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $accion = new Ejemplar();
        $id = $accion->getIdEjemplar($id);

        $ejemplar = Ejemplar::find($id);
        $ejemplar->delete();

        relation::where('padre_id', $id)
            ->update(['padre_id' => 0]);

        $accionGet = new data_field();
        $ejemplares = $accionGet->getDataField();

        $ejemplares = $accionGet->paginador($ejemplares, null, 10);
            $admin = true;

            

        return response()->json(view('public.sublista', compact('ejemplares', 'admin'))->render());

    }

}

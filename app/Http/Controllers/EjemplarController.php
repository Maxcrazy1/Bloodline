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
    public $notificacion = "";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $accionGet = new data_field();
        $listEje = $accionGet->getDataField();

        if ($request->ajax()) {
            $filterSex = $request->input('sex');
            $filterName = $request->input('name');
            $filterPagination = $request->input('page');
            // $filter4 = $request->input('filter4');

            $nroPage = is_null($filterPagination) ? 1 : $filterPagination;
            $Ejefiltrados = $listEje;

            if ($filterSex) {
                $Ejefiltrados = $accionGet->filtroGenero($Ejefiltrados, 'sex', $filterSex);
            }
            if ($filterName) {
                $Ejefiltrados = $accionGet->filtroGenero($Ejefiltrados, 'name', $filterName);
            }

            $ejemplares = $accionGet->paginador($Ejefiltrados, $nroPage, 5);
            return response()->json(view('public.sublista', compact('ejemplares'))->render());
        } else {

            $razas = DB::table('razas')
                ->select('raza')
                ->get();

            $ejemplares = $accionGet->paginador($listEje, null, 8);

            // $req = "admin";
            return view('admin.ejemplares', compact('ejemplares', 'razas'))->render();
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
        return view('admin.ejemplar', compact('razas', 'columns'));

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

        return $request;

    }

    public function simulator($params)
    {
        $family = [];
        $ids = explode("&", $params);
        foreach ($ids as $key => $value) {
            $id = Ejemplar::where('slug', '=', $value)
                ->firstOrFail();
            $id = $id->id;
            $abuelosP = $this->getGenerations($id);
            $ejemplar = $this->getDetails($id);

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
    public function show(Request $req, $id)
    {
        $orden = [];
        $page = new pagesController();
        $datos = new Ejemplar();

        $id = Ejemplar::where('slug', '=', $id)
            ->firstOrFail();
        $id = $id->id;

        $ejemplar = $datos->getDetails($id);
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
    public function edit($id)
    {

        // $padres = $this->getParents($id);
        foreach (DB::table('razas')->select('raza')->cursor() as $allRazas) {
            $razas[$allRazas->raza] = $allRazas->raza;
        }

        $columns = field::all();

        $datos = new Ejemplar();

        $id = Ejemplar::where('slug', '=', $id)
            ->firstOrFail();
        $id = $id->id;

        $details = $datos->getDetails($id);

        return view('admin.editar-ejemplar', compact('details', 'razas', 'columns'));
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

        $id = DB::table('ejemplars')
        ->where("slug",'=',$id)
        ->select('id')
        ->limit(1)
        ->get();

    $id=$id[0]->id;

        // Ciclo for para actualizar los datos
        foreach ($request->request as $key => $value) {
            $idColumn = DB::table('fields')
                ->where('name', $key)
                ->value('id');

            if (!is_null($idColumn)) {
            data_field::where('field_id', $idColumn)
            ->where('ejemplar_id', $id)
            ->update(['data' => $value]);

      

            }
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $id = Ejemplar::where('slug', '=', $id)
        //     ->firstOrFail();
        // $id = $id->id;

        // Ejemplar::destroy($id);

        return redirect()->action('EjemplarController@index');

    }

}

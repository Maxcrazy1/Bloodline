<?php

namespace App\Http\Controllers;

use App\breeder;
use App\Ejemplar;
use App\Media;
use App\Owner;
use App\relation;
use DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class EjemplarController extends Controller
{
    public $notificacion="";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filter1 = $request->input('filter1');
            $filter2 = $request->input('filter2');
            $filter3 = $request->input('filter3');
            $filter4 = $request->input('filter4');
            $ejemplares = Ejemplar::select('ejemplars.slug', 'name', 'color', 'genre', 'type_register', 'birthday', 'src')
                ->leftJoin('media', 'ejemplars.id', '=', 'media.ejemplar_id')
                ->genre($filter1)
                ->color($filter2)
                ->name($filter3)
                ->raza($filter4)
                ->groupBy('ejemplars.id')
                ->paginate(15);

            $req = "admin";
            return response()->json(view('public.sublista', compact('ejemplares', 'req'))->render());
        }

        $razas = DB::table('razas')
        ->select('raza')
        ->get();

        $ejemplares = Ejemplar::paginate(10);
        $req = "admin";
        $notif="";
    
        return view('admin.ejemplares', compact('ejemplares', 'req','razas','notif'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $razas = DB::table('razas')
            ->select('raza')
            ->get();
        return view('admin.ejemplar', compact('razas'));

    }

    public function saveRelations($request, $id)
    {
        $condicion = [
            $request->input('id_macho'),
            $request->input('id_hembra')];

        for ($i = 0; $i < 2; $i++) {
            if ($condicion[0] != "" or $condicion[1] != "") {
                $foo = $condicion != "" ? [1, 'id_macho'] : [2, 'id_hembra'];
                $condicion[($foo[0] - 1)] = "";

                $relation = new relation();
                $relation->id_relation = $foo[0];
                $relation->padre_id = $request->input($foo[1]);
                $relation->hijo()->associate($id);
                $relation->save();
            }
        }
    }

    public function saveMedia($request, $id)
    {
        if ($request->hasFile('src')) {
            $file = $request->file('src');
            foreach ($file as $key) {
                $nameFile = $request->input('name') . '_' . time() . $key->getClientOriginalName();
                $extension = pathinfo($nameFile, PATHINFO_EXTENSION);
                $media = new Media();
                $files = ['mp4', 'avi', 'mkv', 'flv', 'mov', 'wmv'];

                $key->move(public_path() . '/media/.', $nameFile);

                if (in_array($extension, $files)) {
                    $ffmpeg = 'C:/FFMpeg/bin/ffmpeg.exe';
                    $video = public_path('media/') . $nameFile;
                    $image = public_path('media/thumbs/') . $request->input('name') . '_' . time() . $key->getClientOriginalName() . '.jpg';
                    $interval = 3;
                    $size = '200x200';
                    $cmd = "$ffmpeg -i $video -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1";
                    $resultado = exec($cmd);

                } else {
                    $destino = public_path('media/thumbs/') . $nameFile;
                    $img = Image::make(public_path('media/') . $nameFile)
                        ->resize(200, 200)
                        ->save($destino);

                }

                $media->src = $nameFile;
                $media->ejemplar()->associate($id);
                $media->save();

            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ejemplar = new Ejemplar();
        $ejemplar->name = $request->input('name');
        $ejemplar->birthday = $request->input('date');
        $ejemplar->color = $request->input('color');
        $ejemplar->genre = $request->input('sex');
        $ejemplar->type_register = $request->input('typeRegister');
        $ejemplar->location = $request->input('location');
        $ejemplar->birth_location = $request->input('birthLocation');
        $ejemplar->raza = $request->input('raza');
        $ejemplar->slug = Str::slug($ejemplar->name, '-') . '-' . time();

        if (empty($request->input('firstName'))) {
        } else {
            $proper = new Owner();
            $proper->name = $request->input('firstName');
            $proper->last_name = $request->input('lastName');
            $proper->save();
        }

        if (empty($request->input('firstNameSeeder'))) {
        } else {
            $breeder = new breeder();
            $breeder->name = $request->input('firstNameSeeder');
            $breeder->last_name = $request->input('LastNameSeeder');
            $breeder->web_Page = $request->input('webpage');
            $breeder->save();

        }

        $breeder = breeder::all();
        $owner = Owner::all();

        $ejemplar->owner()->associate($owner->last());
        $ejemplar->breeder()->associate($breeder->last());
        $ejemplar->save();

        $id = Ejemplar::all();

        $this->saveMedia($request, $id->last());
        $this->saveRelations($request, $id->last());

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
        // return ;
        return view('public.arbol', compact('family'));

    }

    public function getGenerations($id)
    {
        $abuelos = [];

        $temp = [];
        $temp2 = [];

        $segundaG = $this->getParents($id);

        for ($i = 0; $i < count($segundaG); $i++) {
            $terceraG = $this->getParents($segundaG[$i]->padre_id);
            # code...

            for ($j = 0; $j < count($terceraG); $j++) {
                $cuartaG = $this->getParents($terceraG[$j]->padre_id);

                foreach ($cuartaG as $key => $value) {
                    array_push($temp2, $value);

                }
            }

            foreach ($terceraG as $key => $value) {
                array_push($temp, $value);
            }
        }

        $familia = [
            "Segunda generacion" => $segundaG,
            "Tercera generacion" => $temp,
            "Cuarta generacion" => $temp2,
        ];

        array_push($abuelos, $familia);

        return $abuelos;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Ejemplar::where('slug', '=', $id)
            ->firstOrFail();
        $id = $id->id;
        $ejemplar = $this->getDetails($id);
        $brothers = $this->getBrothers($id);
        $hijos = $this->getChildrens($id);
        $owner = Owner::find($ejemplar[0]->owner_id);
        $breeder = breeder::find($ejemplar[0]->breeder_id);
        $props = [
            "Propietario" => $owner,
            "Criador" => $breeder,

        ];

        $details = [
            "Detalles" => $ejemplar,
            "Hermanos" => $brothers,
            "Hijos" => $hijos,
            "Dueños" => $props,
        ];

        $abuelos = $this->getGenerations($id);
        // return $details['Detalles'][0]->medias[0]->src;

        return view('public.ejemplar', compact('details', 'abuelos'));

    }

    public function getEjemplars(Request $request)
    {
        
    }

    public function getDetails($id)
    {
        $ejemplar = DB::table('ejemplars')
            ->where('ejemplars.id', '=', $id)
            ->get();

        $media = DB::table('media')
            ->where('media.ejemplar_id', $ejemplar[0]->id)
            ->get();

        $ejemplar[0]->medias = $media;
        return $ejemplar;
    }

    public function getParents($id)
    {
        $medias = [];
        $hijos = DB::table('ejemplars')
            ->select('relations.padre_id')
            ->join('relations', 'relations.hijo_id', '=', 'ejemplars.id')
            ->where('relations.hijo_id', $id);

        $padres = DB::table('ejemplars')
            ->joinSub($hijos, 'padres', function ($join) {
                $join->on('padres.padre_id', '=', 'ejemplars.id');
            })
            ->get();

        foreach ($padres as $key => $value) {
            $media = DB::table('media')
                ->where('media.ejemplar_id', $value->id)
                ->get();

            $padres[$key]->medias = $media;
        }

        return $padres;
    }

    public function getChildrens($id)
    {

        $childs = DB::table('ejemplars')
            ->join('relations', 'relations.hijo_id', '=', 'ejemplars.id')
            ->where('relations.padre_id', '=', $id)
            ->get();

        return $childs;
    }

    public function getBrothers($id)
    {
        $parents = DB::table('ejemplars')
            ->select('padre_id')
            ->join('relations', 'hijo_id', '=', 'ejemplars.id')
            ->where('ejemplars.id', $id);

        $childrens = DB::table('ejemplars')
            ->joinSub($parents, 'padres', function ($join) {
                $join->on('padres.padre_id', '=', 'ejemplars.id');
            })

            ->join('relations', 'relations.padre_id', '=', 'padres.padre_id')
            ->select('hijo_id')
            ->groupBy('hijo_id');

        $brothers = DB::table('ejemplars')
            ->joinSub($childrens, 'hermanos', function ($join) {
                $join->on('hermanos.hijo_id', '=', 'ejemplars.id');
            })
            ->where('hermanos.hijo_id', '<>', $id)
            ->get();

        return $brothers;
    }

    public function getMedia($id)
    {
        $media = DB::table('media')
            ->select('src')
            ->where('ejemplar_id', $id)
            ->get();
        return $media;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Ejemplar::where('slug', '=', $id)
            ->firstOrFail();
        $id = $id->id;
        $details = $this->getDetails($id);
        $padres = $this->getParents($id);

        return view('admin.editar-ejemplar', compact('details', 'padres'));
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
        $media = new Media();
        $ejemplar = new Ejemplar();
        $ejemplar->where('id', $id)
            ->update(
                ['name' => $request['name'],
                    'birthday' => $request['date'],
                    'color' => $request['color'],
                    'genre' => $request['sex'],
                    'type_register' => $request['typeRegister'],
                    'location' => $request['location'],
                    'birth_location' => $request['birthLocation']]
            );
        $condicion = $request->input('id_macho');

        for ($i = 0; $i < 2; $i++) {
            if ($request->input('id_macho') != "" or $request->input('id_hembra') != "") {
                $foo = $condicion != "" ? [1, 'id_macho'] : [2, 'id_hembra'];
                $condicion = "";

                $relation = new relation();

                $relation->where([
                    ['id_relation', '=', $foo[0]],
                    ['hijo_id', '=', $id],
                ])
                    ->update(
                        ['id_relation' => $foo[0],
                            'padre_id' => $request->input($foo[1]),
                        ]
                    );
            }
        }

        if (empty($request->input('firstName'))) {
        } else {
            $proper = new Owner();
            $proper->name = $request->input('firstName');
            $proper->last_name = $request->input('lastName');
            $proper->save();
        }

        if (empty($request->input('firstNameSeeder'))) {
        } else {
            $breeder = new breeder();
            $breeder->name = $request->input('firstNameSeeder');
            $breeder->last_name = $request->input('LastNameSeeder');
            $breeder->web_Page = $request->input('webpage');
            $breeder->save();

        }

        $breeder = breeder::all();
        $owner = Owner::all();
        $id = Ejemplar::all();

        $ejemplar->owner()->associate($owner->last());
        $ejemplar->breeder()->associate($breeder->last());
        $ejemplar->save();

        $this->saveMedia($request, $id);
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

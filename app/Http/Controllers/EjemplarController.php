<?php

namespace App\Http\Controllers;

use App\breeder;
use App\Ejemplar;
use App\Media;
use App\Owner;
use App\relation;
use DB;
use Illuminate\Http\Request;
use Image;

class EjemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ejemplar $ejemplar)
    {
        // $ejemplars = DB::table('ejemplars')
        //     ->select('id', 'name', 'birthday', 'color', 'genre')
        //     ->where('genre', $genre)
        //     ->get();
        // return $ejemplars;
        return $ejemplar;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                $media->ejemplar()->associate($id->last());
                $media->save();

            }
        }

        $relationP = new relation();
        $request->input('LastNameSeeder');
        $relationP->id_relation = 1;
        $relationP->padre_id = $request->input('id_macho');
        $relationP->hijo()->associate($id->last());
        $relationP->save();

        $relationM = new relation();
        $relationM->id_relation = 2;
        $relationM->padre_id = $request->input('id_hembra');
        $relationM->hijo()->associate($id->last());
        $relationM->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $abuelos = [];
        $abuel = [];
        $ejemplar = $this->getDetails($id);
        $brothers = $this->getBrothers($id);
        $hijos = $this->getChildrens($id);
        $owner = Owner::find($ejemplar[0]->owner_id);
        $breeder = breeder::find($ejemplar[0]->breeder_id);
        $props = [
            "Propietario" => $owner,
            "Criador" => $breeder,

        ];
        $temp = [];
        $temp2 = [];

        $segundaG = $this->getParents($id);

        for ($i = 0; $i < 2; $i++) {
            $terceraG = $this->getParents($segundaG[$i]->padre_id);

            for ($j = 0; $j < 2; $j++) {
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

        $details = [
            "Detalles" => $ejemplar,
            "Hermanos" => $brothers,
            "Hijos" => $hijos,
            "Dueños" => $props,
        ];

        // return $abuelos;
        return view('public.ejemplar', compact('details', 'abuelos'));

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
    public function update(Request $request, Ejemplar $ejemplar)
    {
        return $request;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

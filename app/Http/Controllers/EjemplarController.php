<?php

namespace App\Http\Controllers;

use App\breeder;
use App\Ejemplar;
use App\Media;
use App\Owner;
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
    public function index()
    {
        //
        return 'hello';
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
            $ejemplar->seeder_id = $breeder->id;
        }
        $ejemplar->save();
        $id = $ejemplar->id;

        if ($request->hasFile('src')) {
            $file = $request->file('src');
            foreach ($file as $key) {
                $media = new Media();

                $nameFile = $request->input('name') . '_' . time() . $key->getClientOriginalName();
                $key->move(public_path() . '/images/.', $nameFile);
                $destino = public_path('images/thumbs/') . $nameFile;

                // $img = Image::make(public_path('images/') . $nameFile)
                //     ->resize(200, 200)
                //     ->save($destino);

                $ffmpeg = 'C:/FFMpeg/bin/ffmpeg.exe';
                $video = public_path('images/') . $nameFile;
                $image = public_path('images/thumbs/') . $request->input('name') . '_' . time() .'thumb.jpg';
                $interval = 3;
                $size = '200x200';
                $cmd = "$ffmpeg -i $video -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1";
                $resultado = exec($cmd);

                // $return = `$cmd`;
                
                $media->src = $nameFile;
                $media->ejemplar_id = $id;
                $media->save();

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ejemplar = Ejemplar::find($id);
        $breeder = breeder::find($ejemplar->seeder_id);
        $media = DB::table('media')->where("ejemplar_id", $id)->pluck('src');
        return view('public.ejemplar', compact('ejemplar', 'breeder', 'media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

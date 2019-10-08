<?php

namespace App\Http\Controllers;

use App\breeder;
use App\Ejemplar;
use App\Media;
use App\Owner;
use Illuminate\Http\Request;

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

                $nameFile = $request->input('name') . ' ' . time() . $key->getClientOriginalName();
                $key->move(public_path() . '/images/.', $nameFile);
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
      return view ('public.ejemplar',compact('ejemplar'));
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

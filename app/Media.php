<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use DB;

class Media extends Model
{
    public function ejemplar()
    {
        return $this->belongsTo('App\Ejemplar');
    }

     //Metódo para guardar datos multimedia
     public function saveMedia($request, $id)
     {
         if ($request->hasFile('src')) {
             $file = $request->file('src');
             foreach ($file as $key) {
                 $media = new Media();
 
                 $nameFile = $request->input('name') . '_' . time() . $key->getClientOriginalName();
                 $extension = pathinfo($nameFile, PATHINFO_EXTENSION);
                 $files = ['mp4', 'avi', 'mkv', 'flv', 'mov', 'wmv'];
 
                 $key->move(public_path() . '/media/.', $nameFile);
 
                 if (in_array($extension, $files)) {
                     $ffmpeg = 'C:/FFMpeg/bin/ffmpeg.exe';
                     $video = public_path('media/') . $nameFile;
                     $image = public_path('media/thumbs/') . $request->input('name') . '_' . time() . $key->getClientOriginalName() . '.jpg';
                     $interval = 2;
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

     
    public function getMedia($id)
    {
        return $media = 
        DB::table('media')
            ->select('src')
            ->where('ejemplar_id', $id)
            ->get();
    }

 
}

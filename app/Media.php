<?php

namespace App;

use App\Ejemplar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Image;

class Media extends Model
{
    public function ejemplar()
    {
        return $this->belongsTo('App\Ejemplar');
    }

    /**
     * Metòdo para guardar multimedia de los ejemplares,
     * en caso de que sea video utiliza ffmpeg y en caso de que sea imagen la libreria image-intervention
     *
     *
     * la libreria image-intervention que se encarga
     * de tratar las imagenes, tiene el defecto de que en ocasiones lanza algùn error sin informaciòn
     * y lanza pantallazo blanco
     *
     * @param  \Illuminate\Http\Request  $request
     * @param mixed $id - Id del ejemplar para ser asociado con la imagen
     */
    public function saveMedia(Request $request, $id)
    {
        if ($request->hasFile('src')) {
            $file = $request->file('src');
            // $url0=explode("backend",public_path());
            // public_path()=$url0[0]."/";
            foreach ($file as $key) {
                $media = new Media();

                $nameFile = $request->input('name') . '_' . rand(1, 99999) . $key->getClientOriginalName();
                $extension = pathinfo($nameFile, PATHINFO_EXTENSION);
                $files = ['mp4', 'avi', 'mkv', 'flv', 'mov', 'wmv'];
                $key->move(public_path() . '/media/.', $nameFile);
                if (in_array($extension, $files)) {
                    $destino = public_path().'/media/thumbs/' . $nameFile .'.jpg';
                    $img = Image::make(public_path() .'/media/video.png')
                        ->resize(200, 200);
                    $img->save($destino);
                    // $ffmpeg = 'C:/FFMpeg/bin/ffmpeg.exe';
                    // $video = public_path('media/') . $nameFile;
                    // $image = public_path('media/thumbs/') . $request->input('name') . '_' . time() . $key->getClientOriginalName() . '.jpg';
                    // $interval = 2;
                    // $size = '200x200';
                    // $cmd = "$ffmpeg -i $video -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1";
                    // $resultado = exec($cmd);
                } else {
                    $destino = public_path().'/media/thumbs/' . $nameFile;
                    $img = Image::make(public_path() .'/media/'. $nameFile)
                        ->resize(200, 200);
                    $img->save($destino);
                }

                $media->src = $nameFile;
                $media->ejemplar()->associate($id);
                $media->save();

            }
        }
    }

    /**
     * 
     * Metòdo para solicitar todas las imagenes o videos de un ejemplar
     * 
     * @param mixed $slug - Slug del ejemplar
     * @return array $media - Todas las imgs o vídeos del ejemplar
     */
    public function getMedia($slug)
    {
        $ejemplar = new Ejemplar();
        $id = $ejemplar->getIdEjemplar($slug);

        return $media =
        $this->select('src')
            ->where('ejemplar_id', $id)
            ->get();

    }

}

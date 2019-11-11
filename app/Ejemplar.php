<?php

namespace App;

use App\Media;
use DB;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    //Relaciones del ejemplar con parentescos
    public function relations()
    {
        return $this->hasMany('App\relation');
    }

    public function data()
    {
        return $this->hasMany('App\data_field');
    }

    public function media()
    {
        return $this->hasMany('App\Media');
    }

    public function delete() {
        
        $this->media()->delete();
        $this->data()->delete();
        $this->relations()->delete();
        parent::delete();
    }
    /**
     * Scope del genero del ejemplar
     *
     * @param mixed $query - Query del llamado
     * @param mixed $genre - genero del ejemplar
     * @return Query Query con filtros
     */
    public function scopeGenre($query, $genre)
    {
        if ($genre) {
            return $query->where('genre', 'LIKE', "%$genre%");
        }

    }

    /**
     * Scope del Nombre del ejemplar
     *
     * @param mixed $query - Query del llamado
     * @param mixed $genre - Nombre del ejemplar
     * @return Query Query con filtros
     */
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }

    }

    /**
     * Scope del Color del ejemplar
     *
     * @param mixed $query - Query del llamado
     * @param mixed $genre - Color del ejemplar
     * @return Query Query con filtros
     */
    public function scopeColor($query, $color)
    {
        if ($color) {
            return $query->where('color', 'LIKE', "%$color%");
        }

    }

    /**
     * Scope de la raza del ejemplar
     *
     * @param mixed $query - Query del llamado
     * @param mixed $genre - raza del ejemplar
     * @return Query Query con filtros
     */
    public function scopeRaza($query, $raza)
    {
        if ($raza) {
            return $query->where('raza', 'LIKE', "%$raza%");
        }

    }

    /**
     * Metòdo para obtener detalles del ejemplar
     *
     * @param mixed $id - Id del ejemplar
     * @return Array detalles del ejemplar
     */
    public function getDetails($slug)
    {
        $datosEje = array();

        $id = $this->getIdEjemplar($slug);

        foreach (DB::table('ejemplars')
            ->join('data_fields', 'ejemplars.id', '=', 'data_fields.ejemplar_id')
            ->join('fields', 'data_fields.field_id', '=', 'fields.id')
            ->where('ejemplars.id', '=', $id)
            ->groupBy('data_fields.field_id')
            ->select('ejemplars.id', 'data_fields.data', 'fields.name', 'ejemplars.slug')
            ->cursor() as $ejemplar) {
            $datosEje[$ejemplar->name] = $ejemplar->data;
        }

        $actionMedia = new Media;
        if (isset($ejemplar)) {
            $media = $actionMedia->getMedia($slug);
            $datosEje['medias'] = $media;
        }

        $datosEje['slug'] = $ejemplar->slug;
        return $datosEje;
    }

    /**
     * Metòdo para obtener hijos del ejemplar
     *
     * @param mixed $id - Id del ejemplar
     * @return Array hijos del ejemplar
     */
    public function getChildrens($id)
    {

        return $childs =
        DB::table('ejemplars')
            ->join('relations', 'relations.ejemplar_id', '=', 'ejemplars.id')
            ->join('data_fields', 'data_fields.ejemplar_id', '=', 'relations.ejemplar_id')
            ->where([
                ['relations.padre_id', '=', $id],
                ['data_fields.field_id', '=', 1]])
            ->select('slug', 'data')
            ->get();

    }

    /**
     * Metòdo para obtener hermanos del ejemplar
     * Query avanzada ¡no tocar!
     *
     * @param mixed $id - Id del ejemplar
     * @return Array Hermanos del ejemplar
     */
    public function getBrothers($id)
    {
        $parents = DB::table('ejemplars')
            ->select('padre_id')
            ->join('relations', 'ejemplar_id', '=', 'ejemplars.id')
            ->where('ejemplars.id', $id);

        $childrens = DB::table('ejemplars')
            ->joinSub($parents, 'padres', function ($join) {
                $join->on('padres.padre_id', '=', 'ejemplars.id');
            })

            ->join('relations', 'relations.padre_id', '=', 'padres.padre_id')
            ->select('ejemplar_id')
            ->groupBy('ejemplar_id');

        return $brothers = DB::table('ejemplars')
            ->joinSub($childrens, 'hermanos', function ($join) {
                $join->on('hermanos.ejemplar_id', '=', 'ejemplars.id');
            })
            ->join('data_fields', 'data_fields.ejemplar_id', '=', 'hermanos.ejemplar_id')
            ->where([
                ['hermanos.ejemplar_id', '<>', $id],
                ['data_fields.field_id', '=', 1],
            ])
            ->select('slug', 'data')
            ->groupBy('slug')
            ->get();
    }

    /**
     * Funciòn para extraer toda la familia del ejemplar con los items vacìos en caso de que no existan, de esa forma
     * se evitan errores a posteridad
     *
     * @param mixed $id - Id del ejemplar para buscar la familia
     * @return array - Toda la familia del ejemplar
     */
    public function getGenerations($id)
    {

        $abuelos = [];
        $temp = [];
        $temp2 = [];

        $segundaG = $this->ItemFamily($id, false);

        for ($i = 0; $i < count($segundaG); $i++) {
            $terceraG = $this->ItemFamily($segundaG[$i]["id"], true);
            for ($j = 0; $j < count($terceraG); $j++) {
                $cuartaG = $this->ItemFamily($terceraG[$j]["id"], true);
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
        return $familia;

    }

    /**
     *
     * Busca los datos del familiar y en caso de que no exista llena la array con items vacìos para evitar errores visuales
     *
     * @param mixed $iterador - Id del familiar o en su defecto valor null
     * @return Item_Array - El item con los datos o con valores null
     */
    public function ItemFamily($iterador, $switch)
    {
        $iterador = ($iterador != 'null') ?
        $this->getParents($iterador) :
        $this->itemVacio($switch);

        return $iterador;
    }

    /**
     * Funciòn encargada de obtener los registros de los padres, en caso de que no exista el item en la array queda vacio
     * para evitar futuros errores visuales
     *
     * @param mixed $id - Id del hijo
     * @return Array - Devuelve los 2 padres de ese ejemplar, sino existe devuelve el item vacio
     */
    public function getParents($id)
    {
        $medias = [];
        $padres = [];

        $hijos = DB::table('ejemplars')
            ->select('relations.padre_id', 'relations.id_relation')
            ->join('relations', 'relations.ejemplar_id', '=', 'ejemplars.id')
            ->where('relations.ejemplar_id', $id);

        $parents = DB::table('ejemplars')
            ->joinSub($hijos, 'padres', function ($join) {
                $join->on('padres.padre_id', '=', 'ejemplars.id');
            })
            ->select('slug', 'ejemplars.id', 'id_relation')
            ->get()
            ->toArray();

        for ($i = 0; $i < 2; $i++) {

            //En caso de que no exista y no hayan ejemplares en el registro
            if (count($parents) == 0) {
                $empty = $this->itemVacio(false);
                array_push($padres, $empty);
                $item = $this->itemVacio(false);
                array_push($padres, $item);
                break;

            }

            // En caso de que tenga la relación paternal y exista el item
            else if (isset($parents[$i]) && $parents[$i]->id_relation == 1) {

                $item = $this->LlenarItem($parents[$i]);
                array_push($padres, $item);

            }

            // En caso de que tenga la relación maternal y exista el item y ya se haya añadido el
            //padre anteriormente
            else if (isset($parents[$i]) && $parents[$i]->id_relation == 2 && count($padres) == 1) {
                $item = $this->LlenarItem($parents[$i]);
                array_push($padres, $item);
            }

            //En caso de que tenga la relación maternal y solo este la madre en los registros
            else if (isset($parents[$i]) && $parents[$i]->id_relation == 2) {
                $empty = $this->itemVacio(false);
                array_push($padres, $empty);
                $item = $this->LlenarItem($parents[$i]);
                array_push($padres, $item);

            }
            //En caso de solo estar la relación paternal
            else if (count($padres) == 1) {

                $empty = $this->itemVacio(false);
                array_push($padres, $empty);
            }

        }

        return $padres;
    }

    /**
     * Metodo interno para llenar un item dee la array con los datos del ejemplar
     *
     * @param mixed $param - Colleciòn con todos los parametros del ejemplar
     * @return Array - Item de la array lleno
     */
    private function LlenarItem($param)
    {
        $item['slug'] = $param->slug;
        $item['id'] = $param->id;
        $item['Detalles'] = $this->getDetails($param->slug);
        return $item;
    }

    /**
     * Metodo interno para llenar un item dee la array con datos vacìos,
     * la razòn es porque son necesarios a la hora de mostrar la informaciòn,
     * asi se muestran los ejemplares en el lugar que les corresponden sin dañar su posiciòn
     *
     * @param mixed $switch - Boleano
     * @return Array - Item de la array lleno
     */
    private function itemVacio($switch)
    {
        if ($switch) {
            $item[0] =
                ["slug" => 'null',
                "id" => 'null',
                "Detalles" => 'null'];

            $item[1] =
                ["slug" => 'null',
                "id" => 'null',
                "Detalles" => 'null'];

        } else {
            $item =
                ["slug" => 'null',
                "id" => 'null',
                "Detalles" => 'null'];

        }

        return $item;
    }

    /**
     * Función para extraer especificamente el id del ejemplar
     *
     * @param mixed - $slug el slug del ejemplar para extraer la data
     * @return string - id del ejemplar
     */
    public function getIdEjemplar($slug)
    {
        $id = DB::table('ejemplars')
            ->where("slug", '=', $slug)
            ->select('id')
            ->limit(1)
            ->get();

        return $id = $id[0]->id;

    }

}

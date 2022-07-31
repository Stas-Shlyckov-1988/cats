<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cats extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cats';


    public function getImages($idCat) {
        return DB::select('select f.* from files f inner join cats_has_file cf on cf.file_id = f.id where cf.cat_id = ' . $idCat);
    }

    public function removeFiles() {

        $files = DB::select('SELECT f.* FROM files f INNER JOIN cats_has_file cf ON f.id = cf.file_id WHERE cf.cat_id = '. $this['id']);
        $destinationPath = public_path('/images');

        DB::table('cats_has_file')->where('file_id', '=', $this['id'])->delete();
        foreach($files as $file) {
            DB::table('files')->where('id', '=', $file->id)->delete();
            @unlink($destinationPath . $file->name);
        }

    }
}

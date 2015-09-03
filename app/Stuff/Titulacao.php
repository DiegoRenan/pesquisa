<?php namespace App\Stuff;

use Illuminate\Database\Eloquent\Model;

class Titulacao extends Model {

    protected $table = 'titulacaos';

    protected $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];


    public function pesquisador()
    {
        $this->hasMany('App\Gestao\Pesquisador');
    }
}

<?php namespace App\Research;

use Illuminate\Database\Eloquent\Model;

class GrupoPesquisa extends Model {

	protected $table = 'grupo_pesquisas';

    protected $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];

    public function pesquisador()
    {
        return $this->belongsToMany('App\Gestao\Pesquisador');
    }


}

<?php namespace App\Research;

use Illuminate\Database\Eloquent\Model;

class GrupoPesquisa extends Model {

	protected $table = 'grupo_pesquisas';

    protected $primaryKey = 'idGrupoPesquisa';

    protected $fillable = ['name'];

    protected $visible = ['idGrupoPesquisa','name'];

    protected $dates = ['created_at', 'updated_at'];

    public function pesquisador()
    {
        return $this->belongsToMany('App\Gestao\Pesquisador', 'pesquisador_has_grupo_pesquisa', 'pesquisador_id', 'grupoPesquisa_id');
    }


}

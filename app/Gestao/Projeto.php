<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model {

	protected $table = 'PROJ_projetos';

    protected $primaryKey = 'idProjeto';

    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'caracterizacao',
        'objetivos',
        'metodologia',
        'referencias',
        'convenio_id',
        'financiador_id',
        'subAreaConhecimento_id',
        'grupoPesquisa_id',
        'pesquisador_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function pesquisador()
    {
        return $this->belongsTo('App\Gestao\Pesquisador');
    }

    public function projetoDatas()
    {
        return $this->hasMany('App\Gestao\ProjetoDatas');
    }

    public function convenio()
    {
        return $this->belongsTo('App\Gestao\Convenio');
    }

    public function financiador()
    {
        return $this->belongsTo('App\Gestao\Financiador');
    }

    public function subAreaConhecimento()
    {
        return $this->belongsTo('App\Stuff\SubAreaCnpq');
    }

    public function palavrasChave()
    {
        return $this->hasMany('App\Gestao\PalavrasChave');
    }

    public function membros()
    {
        return $this->belongsToMany('App\Gestao\Membro', 'PROJ_projeto_PROJ_membro')->withPivot('cargaHoraria');
    }

    public function orcamento()
    {
        return $this->hasOne('App\Gestao\Orcamento');
    }
}

<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model {

	protected $table = 'PROJ_projetos';

    protected $primaryKey = 'idProjeto';

    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function pesquisador()
    {
        return $this->belongsTo('App\Gestao\Pesquisador');
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
        return $this->belongsTo('App\Gestao\SubAreaConhecimento');
    }
}

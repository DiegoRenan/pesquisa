<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model {

    protected $table = 'PROJ_orcamento';

    protected $primaryKey = 'idOrcamento';

    protected $fillable = [
        'materialConsumo',
        'servicosPessoaFisica',
        'servicosPessoaJuridica',
        'obrasInstalacoes',
        'equipamentoMaterial'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    public function projeto()
    {
        return $this->belongsTo('App\Gestao\Projeto');
    }

}

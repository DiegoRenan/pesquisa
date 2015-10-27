<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model {

    protected $table = 'PROJ_membros';

    protected $primaryKey = 'idMembro';

    protected $fillable = [
        'nome_membro',
        'cpf',
        'instituicao',
        'titulacao_id',
        'categoria_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function projeto()
    {
        return $this->belongsToMany('App\Gestao\Projeto', 'PROJ_projeto_PROJ_membro');
    }
}

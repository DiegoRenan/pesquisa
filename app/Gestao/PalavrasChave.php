<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class PalavrasChave extends Model {

    protected $table = 'PROJ_palavras_chave';

    protected $primaryKey = 'idPalavra';

    protected $timestamps = false;

    protected $fillable = ['palavra', 'projeto_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->hasMany('App\Gestao\Projeto');
    }

}

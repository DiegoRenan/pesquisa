<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class PalavrasChave extends Model {

    protected $table = 'PROJ_palavras_chave';

    protected $primaryKey = 'idPalavra';

    public $timestamps = false;

    protected $fillable = ['palavra'];

    protected $hidden = ['projeto_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->belongsTo('App\Gestao\Projeto');
    }

}

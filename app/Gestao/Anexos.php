<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class Anexos extends Model {

    protected $table = 'PROJ_anexos';

    protected $primaryKey = 'idAnexo';

    protected $fillable = ['nome', 'arquivo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->belongsTo('App\Gestao\Projeto');
    }

}

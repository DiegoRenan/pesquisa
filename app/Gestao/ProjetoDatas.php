<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class ProjetoDatas extends Model {

    protected $table = 'PROJ_datas';

    protected $primaryKey = 'idData';

    protected $timestamps = false;

    protected $fillable = ['dataInicio', 'duracao', 'projeto_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->hasMany('App\Gestao\Projeto');
    }

}

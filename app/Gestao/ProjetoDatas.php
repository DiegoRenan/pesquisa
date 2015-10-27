<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class ProjetoDatas extends Model {

    protected $table = 'PROJ_datas';

    protected $primaryKey = 'idData';

    public $timestamps = false;

    protected $fillable = ['dataInicio', 'duracao'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->belongsTo('App\Gestao\Projeto');
    }

}

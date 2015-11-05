<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class CronogramaAno extends Model {

    protected $table = 'PROJ_cronogramas_ano';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'anoMeses'
    ];

    public function atividade()
    {
        return $this->hasMany('App\Gestao\CronogramaAno');
    }

}

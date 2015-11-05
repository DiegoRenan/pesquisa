<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model {

    protected $table = 'PROJ_cronogramas';

    protected $primaryKey = 'idCronograma';

    public $timestamps = false;

    protected $fillable = [
        'atividade'
    ];

    public function projeto()
    {
        return $this->belongsTo('App\Gestao\Projeto');
    }

    public function atividade()
    {
        return $this->hasMany('App\Gestao\CronogramaAno');
    }

}

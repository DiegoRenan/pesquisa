<?php namespace App\Stuff;

use Illuminate\Database\Eloquent\Model;

class RegimeTrabalho extends Model {

    protected $table = 'regime_trabalhos';

    protected $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];

    public function pesquisador()
    {
        $this->hasMany('App\Gestao\Pesquisador');
    }

}

<?php namespace App\Stuff;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

    protected $table = 'departamentos';

    protected $fillable = ['name', 'sigla', 'campus_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function campus()
    {
        return $this->belongsTo('App\Stuff\Campus');
    }

    public function pesquisador()
    {
        $this->hasMany('App\Gestao\Pesquisador');
    }
}

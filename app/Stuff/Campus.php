<?php namespace App\Stuff;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model {

    protected $table = 'campus';

    protected $fillable = ['name', 'sigla'];

    protected $dates = ['created_at', 'updated_at'];

    public function instituto()
    {
        return $this->hasMany('App\Stuff\Instituto');
    }

    public function departamento()
    {
        return $this->hasMany('App\Stuff\Departamento');
    }

}

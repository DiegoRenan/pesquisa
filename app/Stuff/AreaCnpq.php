<?php namespace App\Stuff;

use Illuminate\Database\Eloquent\Model;

class AreaCnpq extends Model {

	protected $table = 'areas_cnpq';

    protected  $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];

    public function subAreas()
    {
        return $this->hasMany('App\Stuff\SubAreaCnpq');
    }

}

<?php namespace App\Stuff;

use Illuminate\Database\Eloquent\Model;

class SubAreaCnpq extends Model {

    protected $table = 'sub_areas_cnpq';

    protected  $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];

    public function area()
    {
        return $this->belongsTo('App\Stuff\AreaCnpq');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->hasMany('App\Gestao\Projeto');
    }

}

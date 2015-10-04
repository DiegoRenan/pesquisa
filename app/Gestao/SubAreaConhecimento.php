<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class SubAreaConhecimento extends Model {

    protected $table = 'PROJ_sub_areas_conhecimento';

    protected $primaryKey = 'idSubArea';

    protected $timestamps = false;

    protected $fillable = ['nome', 'area_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->hasMany('App\Gestao\Projeto');
    }

}

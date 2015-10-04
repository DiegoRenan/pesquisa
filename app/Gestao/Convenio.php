<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model {

	protected $table = 'PROJ_convenios';

    protected $primaryKey = 'idConvenio';

    protected $timestamps = false;

    protected $fillable = ['nome'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->hasMany('App\Gestao\Projeto');
    }
}

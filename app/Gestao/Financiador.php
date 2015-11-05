<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;

class Financiador extends Model {

    protected $table = 'PROJ_financiadores';

    protected $primaryKey = 'idFinanciador';

    public $timestamps = false;

    protected $fillable = ['nome'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projeto()
    {
        return $this->hasMany('App\Gestao\Projeto');
    }
}

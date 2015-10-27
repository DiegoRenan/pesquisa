<?php namespace App\Gestao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesquisador extends Model {

	use SoftDeletes;
    protected $dates = ['dt_nascimento', 'created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'nome',
        'matricula',
        'cpf',
        'dt_nascimento',
        'rg',
        'pwd',
        'email',
        'telefone',
        'fax',
        'celular',
        'link_lattes',
        'titulacao_id',
        'categoria_id',
        'regime_trabalho_id',
        'instituto_id',
        'departamento_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function titulacao()
    {
        return $this->belongsTo('App\Stuff\Titulacao');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo('App\Stuff\CategoriaPesquisador');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regime_trabalho()
    {
        return $this->belongsTo('App\Stuff\RegimeTrabalho');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instituto()
    {
        return $this->belongsTo('App\Stuff\Instituto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo('App\Stuff\Departamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grupoPesquisa()
    {
        return $this->belongsToMany('App\Research\GrupoPesquisa', 'pesquisador_has_grupo_pesquisa', 'pesquisador_id', 'grupoPesquisa_id');
    }

    public function projeto()
    {
        return $this->hasMany('App\Gestao\Projeto');
    }

    /**
     * @return bool|\Carbon\Carbon|\DateTimeZone|int|string
     */
    public function getCampusID()
    {
        if (!is_null($this->instituto))
            $this->instituto->id;

        elseif (!is_null($this->departamento))
            return $this->departamento->id;

        else
            return 0;
    }

}

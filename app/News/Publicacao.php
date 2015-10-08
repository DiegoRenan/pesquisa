<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Publicacao extends Model {

    use SoftDeletes;
    use PresentableTrait;

    protected $presenter = 'App\Presenters\PublicacaoPresenter';

    protected $fillable = [
        'title',
        'source',
        'url',
        'content',
        'flag_tipo',
        'user_id',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function news()
    {
        return $this->hasOne('App\News\News');
    }

    public function edital()
    {
        return $this->hasOne('App\News\Edital');
    }

    public function documento()
    {
        return $this->hasOne('App\News\Document');
    }

    public function evento()
    {
        return $this->hasOne('App\News\Evento');
    }

}

<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Edital extends Model {

    use PresentableTrait;

    protected $presenter = 'App\Presenters\EditalPresenter';

    public $timestamps = false;

    protected $fillable = [
        'started_at',
        'finished_at',
        'file',
        'publicacao_id'
    ];

    protected $dates = [
        'started_at',
        'finished_at'
    ];

    public function publicacao()
    {
        return $this->belongsTo('App\News\Publicacao');
    }
}

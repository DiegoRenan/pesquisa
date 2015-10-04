<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class News extends Model {

    use PresentableTrait;

    protected $presenter = 'App\Presenters\NewsPresenter';

    public $timestamps = false;

    protected $fillable = [
        'publicacao_id',
        'publicated_at'
    ];

    protected $dates = [
        'publicated_at'
    ];

    public function publicacao()
    {
        return $this->belongsTo('App\News\Publicacao');
    }
}

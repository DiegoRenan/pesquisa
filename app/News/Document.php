<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Document extends Model {

    use PresentableTrait;

    protected $presenter = 'App\Presenters\DocumentPresenter';

    public $timestamps = false;

    protected $fillable = [
        'publicacao_id',
        'file',
    ];

    public function publicacao()
    {
        return $this->belongsTo('App\News\Publicacao');
    }
}

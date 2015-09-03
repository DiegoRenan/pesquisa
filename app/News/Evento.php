<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {

	public $timestamps = false;

    protected $fillable = [
        'publicacao_id',
        'start',
        'end',
        'hour',
        'place',
        'alltime'
    ];

    protected $dates = [
        'start',
        'end'
    ];

    public function publicacao()
    {
        return $this->belongsTo('App\News\Publicacao');
    }
}

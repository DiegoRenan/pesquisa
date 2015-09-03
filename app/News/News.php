<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

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

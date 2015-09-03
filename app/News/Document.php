<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model {

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

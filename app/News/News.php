<?php namespace App\News;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model {

    use SoftDeletes;

    protected $fillable = [
        'title',
        'source',
        'url',
        'content',
        'publicated_at',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'publicated_at'
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

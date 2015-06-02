<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edital extends Model {

    use SoftDeletes;

    protected $fillable = [
        'title',
        'source',
        'url',
        'text',
        'started_at',
        'finished_at',
        'file',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'started_at',
        'finished_at'
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model {

    use SoftDeletes;

    protected $fillable = [
        'title',
        'text',
        'file',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

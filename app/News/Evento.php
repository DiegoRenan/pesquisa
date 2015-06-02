<?php namespace App\News;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {

	//
    protected $fillable = [
        'title',
        'start',
        'end',
        'hour',
        'place',
        'text',
        'alltime'
    ];

    protected $dates = [
        'start',
        'end'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

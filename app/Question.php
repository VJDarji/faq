<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /***
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }
}

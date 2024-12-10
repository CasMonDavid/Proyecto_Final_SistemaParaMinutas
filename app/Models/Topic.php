<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $fillable = ['minuta_id'];

    public function minutas(){
        return $this->belongsTo(Minuta::class,'minuta_id');
    }

    public function decisions(){
        return $this->hasMany(Decision::class,'topic_id');
    }

    public function action(){
        return $this->hasMany(Decision::class,'topic_id');
    }
}

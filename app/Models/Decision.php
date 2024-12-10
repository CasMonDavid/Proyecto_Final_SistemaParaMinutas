<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $table = 'decisions';

    protected $fillable = ['topic_id','description'];

    public function topics(){
        return $this->belongsTo(Topic::class,'topic_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elements_action extends Model
{
    protected $table = 'elements_action';

    protected $fillable = ['topic_id','description'];

    public function topics(){
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}

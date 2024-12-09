<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'decisions';

    protected $fillable = ['id_minuta'];

    public function minutas(){
        return $this->belongsTo(Minuta::class);
    }

    public function decisions(){
        return $this->belongsToMany(Decision::class,'decisions','id_topic','id_minuta');
    }
}

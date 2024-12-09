<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $table = 'decisions';

    protected $fillable = ['id_topics','description'];

    public function minutas(){
        return $this->belongsTo(Minuta::class);
    }
}

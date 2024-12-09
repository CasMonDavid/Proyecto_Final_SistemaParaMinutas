<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elements_action extends Model
{
    protected $table = 'elements_action';

    protected $fillable = ['id_topics','description'];

    public function minutas(){
        return $this->belongsTo(Minuta::class);
    }
}

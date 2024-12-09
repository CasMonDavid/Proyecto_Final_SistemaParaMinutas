<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = ['id_minuta','id_user','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function minutas(){
        return $this->belongsTo(Minuta::class);
    }
}

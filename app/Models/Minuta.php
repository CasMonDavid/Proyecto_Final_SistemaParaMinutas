<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuta extends Model
{
    use HasFactory;

    protected $table = "minutas";

    protected $fillable = ["id_project", "created_by", "date", "direction"];

    public function user(){
        return $this->belongsToMany(User::class, 'users')
            ->withTimestamps();
    }

    public function project(){
        return $this->belongsToMany(Project::class, 'projects')
            ->withTimestamps();
    }

    public function attendance(){
        return $this->belongsToMany(Attendance::class,'attendance', 'id_minuta')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function topics_decsicion(){
        return $this->belongsToMany(Topic::class,'decisions', 'id_minuta')
            ->withPivot('description')
            ->withTimestamps();
    }

    public function topics_action(){
        return $this->belongsToMany(Topic::class,'elements_action', 'id_minuta')
            ->withPivot('description')
            ->withTimestamps();
    }
}

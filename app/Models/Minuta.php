<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuta extends Model
{
    use HasFactory;

    protected $table = "minutas";

    protected $fillable = ["project_id", "created_by", "date", "direction"];

    public function user(){
        return $this->belongsToMany(User::class, 'users')
            ->withTimestamps();
    }

    public function project(){
        return $this->belongsToMany(Project::class, 'projects')
            ->withTimestamps();
    }

    public function attendance(){
        return $this->hasMany(Attendance::class,'minuta_id');
    }

    public function topics_decision(){
        return $this->hasManyThrough(Decision::class, Topic::class, 'minuta_id','topic_id','id','id');
    }

    public function topics_action(){
        return $this->hasManyThrough(Elements_action::class, Topic::class,'minuta_id','topic_id','id','id');
    }
}

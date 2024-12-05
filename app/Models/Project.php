<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = ['name', 'description', 'status', 'created_by'];

    public function user(){
        return $this->belongsToMany(User::class, 'user_project')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function collaborators(){
        return $this->belongsToMany(User::class, 'user_project', 'project_id', 'user_id')
            ->withPivot('role')
            ->withTimestamps();
    }
}

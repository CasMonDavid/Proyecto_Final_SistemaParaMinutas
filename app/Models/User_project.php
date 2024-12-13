<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_project extends Model
{
    use HasFactory;

    protected $table = 'user_project';

    protected $fillable = ['project_id', 'user_id', 'role'];

    // Relación con Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

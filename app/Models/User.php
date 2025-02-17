<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['name', 'email', 'password', 'birthday'];

    public function projects(){
        return $this->belongsToMany(Project::class, 'user_project', 'user_id', 'project_id')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function minutas(){
        return $this->belongsToMany(Minuta::class,'minutas');
    }

    public function attendance(){
        return $this->belongsToMany(Attendance::class, 'attendance')
            ->withPivotValue('status');
    }
}

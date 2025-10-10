<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
}

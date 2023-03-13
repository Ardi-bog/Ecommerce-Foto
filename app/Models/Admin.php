<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use  HasFactory;

    protected $guard = 'admin';
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'password',
        'name',
    ];
    protected $hidden = [
        'password',
    ];
}

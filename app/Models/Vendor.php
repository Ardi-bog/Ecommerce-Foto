<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory;
    protected $guard = 'vendor';
    protected $table = 'vendor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'password',
        'nama_vendor',
    ];
    protected $hidden = [
        'password',
    ];
}

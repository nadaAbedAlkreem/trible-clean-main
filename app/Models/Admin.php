<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use HasFactory
      , SoftDeletes
      , HasApiTokens
      , Notifiable;


    protected $fillable = [
        'name', 'email',   
    ];
    protected $hidden = [
        'password',
     ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Import the trait
class PostModel extends Model
{
    protected $table= "post";
    
   use HasApiTokens, HasFactory, Notifiable; 
    //
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submissions extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'message', 'file_path'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIProject extends Model
{
    use HasFactory;

    protected $table = 'api_projects';
    protected $fillable = [
        'nama_project',
        'client_id',
        'client_secret',
        'access_token',
        'expired_time'
    ];
}

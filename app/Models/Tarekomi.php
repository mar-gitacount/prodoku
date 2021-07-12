<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarekomi extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'gunle',
        'title',
        'message',
    ];
}

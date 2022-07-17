<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disneyplus extends Model
{
    use HasFactory;

    protected $fillable = ['show_name', 'series', 'lead_Actor'];
}

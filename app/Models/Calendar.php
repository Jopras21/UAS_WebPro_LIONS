<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'start', 'end', 'status', 'title', 'description'
    ];
}

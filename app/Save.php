<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'plan', 'target_date', 'target_total', 'current_save', 'description', 'image', 'user_id'
    ];
}

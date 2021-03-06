<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['todo_item', 'due_date', 'status'];

    protected $attributes = [
        'status' => 0
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $primaryKey = 'id';

    public $fillable = [
        'name',
        'deadline',
        'status',
    ];
    protected $table = 'tasks';
}

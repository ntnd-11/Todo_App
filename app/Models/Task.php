<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    use HasFactory;
    // REVIEW: missing
    // Không cần thiết vì đây là giá trị mặc định
    protected $primaryKey = 'id';

    public $fillable = [
        'name',
        'deadline',
        'status',
    ];
    // REVIEW: missing
    // Không cần thiết vì đây là giá trị mặc định
    protected $table = 'tasks';
}

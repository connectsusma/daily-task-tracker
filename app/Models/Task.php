<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = [
    'task_id',
    'name',
    'branch',
    'staff',
    'summary',
    'status',
    'handed_over',
    'task_date',
];


}

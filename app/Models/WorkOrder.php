<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'employee_name',
        'notes',
        'status',
        'image_url',
    ];
}
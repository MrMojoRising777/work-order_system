<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrderImage extends Model
{
    protected $fillable = [
        'url',
    ];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'items';

    protected $casts = [
        'is_completed' => 'boolean'
    ];

    protected $fillable = [
        'checklist_id',
        'description',
        'due',
        'urgency',
        'assignee_id',
        'task_id',
        'is_completed',
        'completed_at',
        'completed_by',
        'updated_by',
        'created_by',
    ];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}

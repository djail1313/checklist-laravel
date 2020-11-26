<?php

namespace App\Models;

use Carbon\Carbon;
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
    ];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }

    public function scopeDueBetween($query, $start_date, $end_date)
    {
        return $query->whereBetween('due', [
            Carbon::createFromTimeString($start_date),
            Carbon::createFromTimeString($end_date),
        ]);
    }

}

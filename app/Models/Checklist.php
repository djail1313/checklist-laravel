<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'checklists';

    protected $casts = [
        'is_completed' => 'boolean'
    ];

    protected $fillable = [
        'object_domain',
        'object_id',
        'task_id',
        'due',
        'urgency',
        'description',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

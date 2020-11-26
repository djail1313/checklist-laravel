<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Template
 * @package App\Models
 * @property Collection $items
 * @property Checklist $checklist
 */
class Template extends Model
{

    use HasFactory;

    protected $table = 'templates';
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by'
    ];

    public function checklist()
    {
        return $this->hasOne(TemplateChecklist::class);
    }

    public function items()
    {
        return $this->hasMany(TemplateItem::class);
    }

    public function assign($data):? Checklist
    {
        $checklist = null;
        if ($this->checklist) {
            DB::transaction(function () use ($data, &$checklist) {
                $checklist = $this->createChecklist($data);
                $this->createItems($checklist);
            });
        }
        return $checklist;
    }

    protected function createChecklist($data): Checklist
    {
        $data['description'] = $this->checklist->description;
        $data['due'] = Carbon::now()->addUnit(
            $this->checklist->due_unit,
            $this->checklist->due_interval
        );
        return Checklist::create($data);
    }

    protected function createItems(Checklist $checklist):? Collection
    {
        return $checklist->items()->createMany(
            $this->items->map(function ($item) {
                return [
                    'description' => $item->description,
                    'due' => Carbon::now()->addUnit(
                        $item->due_unit,
                        $item->due_interval
                    ),
                    'urgency' => $item->urgency,
                ];
            })
        );
    }

}

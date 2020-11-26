<?php

namespace App\Listeners;

use App\Events\ItemInChecklistCompleted;
use App\Models\Checklist;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCompletedInChecklist
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ItemInChecklistCompleted  $event
     * @return void
     */
    public function handle(ItemInChecklistCompleted $event)
    {
        /** @var Checklist $checklist */
        $checklist = Checklist::find($event->getChecklistId());
        if ($checklist) {
            if ($checklist->items()->where('is_completed', false)->count() === 0) {
                $checklist->is_completed = true;
                $checklist->completed_at = Carbon::now();
                $checklist->save();
            }
        }
    }
}

<?php

namespace App\Listeners;

use App\Events\ItemInChecklistInCompleted;
use App\Models\Checklist;

class UpdateInCompletedInChecklist
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
     * @param  ItemInChecklistInCompleted  $event
     * @return void
     */
    public function handle(ItemInChecklistInCompleted $event)
    {
        /** @var Checklist $checklist */
        $checklist = Checklist::find($event->getChecklistId());
        if ($checklist) {
            $checklist->is_completed = false;
            $checklist->save();
        }
    }
}

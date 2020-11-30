<?php

namespace App\Observers;

use App\Observers\Traits\LoggableObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChecklistObserver
{

    use LoggableObserver;

    /**
     * Handle the Template "updating" event.
     *
     * @param  Model $model
     * @return void
     */
    public function updating($model)
    {
        $user = Auth::user();
        if ($user) {
            $model->last_update_by = $user->getAuthIdentifier();
        }
    }

}

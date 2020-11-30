<?php


namespace App\Observers\Traits;


use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait LoggableObserver
{
    /**
     * Handle the Template "creating" event.
     *
     * @param  Model $model
     * @return void
     */
    public function creating($model)
    {
        $user = Auth::user();
        if ($user) {
            $model->created_by = $user->getAuthIdentifier();
        }
    }

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
            $model->updated_by = $user->getAuthIdentifier();
        }
    }

    public function deleted(Model $model)
    {
        $this->createHistory('delete', $model);
    }

    public function created(Model $model)
    {
        $this->createHistory('create', $model);
    }

    public function updated(Model $model)
    {
        $this->createHistory('update', $model);
    }

    protected function createHistory(string $action, Model $model)
    {
        return History::create([
            'loggable_type' => $model->getTable(),
            'loggable_id' => $model->getKey(),
            'action' => $action,
            'value' => $model->toJson(),
        ]);
    }
}

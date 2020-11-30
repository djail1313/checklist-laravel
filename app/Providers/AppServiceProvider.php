<?php

namespace App\Providers;

use App\Models\Checklist;
use App\Models\Item;
use App\Models\Template;
use App\Observers\ChecklistObserver;
use App\Observers\ItemObserver;
use App\Observers\TemplateObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Template::observe(TemplateObserver::class);
        Checklist::observe(ChecklistObserver::class);
        Item::observe(ItemObserver::class);
    }
}

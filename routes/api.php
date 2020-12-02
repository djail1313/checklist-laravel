<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request-lovencuuuwlforeveeeey>user();
});

Route::middleware(['auth:api'])->prefix('v1')->namespace('App\Http\V1\Controllers')->group(function () {

    Route::prefix('checklists')->group(function () {

        Route::namespace('Histories')->prefix('histories')->group(function () {

            Route::get('', 'ListsController@execute')->name('histories.lists');
            Route::get('{history}', 'DetailController@execute')->name('histories.detail');

        });

        Route::namespace('Templates')->prefix('templates')->group(function () {

            Route::get('', 'ListsController@execute')->name('templates.lists');
            Route::post('', 'CreateController@execute')->name('templates.create');
            Route::get('{template}', 'DetailController@execute')->name('templates.detail');
            Route::patch('{template}', 'UpdateController@execute')->name('templates.update');
            Route::delete('{template}', 'DeleteController@execute')->name('templates.delete');
            Route::post('{template}/assigns', 'AssignController@execute')->name('templates.assign');

        });

        Route::namespace('ChecklistItems')->group(function () {

            Route::prefix('{checklist}/items')->group(function () {

                Route::get('', 'GetChecklistItemsController@execute')
                    ->name('checklist_items.lists');
                Route::post('', 'CreateItemController@execute')
                    ->name('checklist_items.create_item');
                Route::post('_bulk', 'BulkUpdateItemController@execute')
                    ->name('checklist_items.bulk_update_item');
                Route::get('{item}', 'DetailItemController@execute')
                    ->name('checklist_items.detail_item');
                Route::patch('{item}', 'UpdateItemController@execute')
                    ->name('checklist_items.update_item');;
                Route::delete('{item}', 'DeleteItemController@execute')
                    ->name('checklist_items.delete_item');

            });

            Route::get('items', 'ListItemsController@execute')
                ->name('checklist_items.list_items');

            Route::get('items/summaries', 'SummaryItemsController@execute')
                ->name('checklist_items.summary_items');

            Route::get('{checklist}/relationships/items', 'GetRelationshipsChecklistItemsController@execute')
                ->name('checklist_items.relationship_lists');

        });

        Route::namespace('Checklists')->group(function () {

            Route::get('', 'ListsController@execute')->name('checklists.lists');
            Route::post('', 'CreateController@execute')->name('checklists.create');
            Route::post('complete', 'CompleteController@execute')->name('checklists.complete');
            Route::post('incomplete', 'InCompleteController@execute')->name('checklists.incomplete');
            Route::get('{checklist}', 'DetailController@execute')->name('checklists.detail');
            Route::patch('{checklist}', 'UpdateController@execute')->name('checklists.update');
            Route::delete('{checklist}', 'DeleteController@execute')->name('checklists.delete');

        });

    });

});



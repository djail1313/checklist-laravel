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
    return $request->user();
});

Route::prefix('v1')->namespace('App\Http\V1\Controllers')->group(function () {

    Route::prefix('checklists')->group(function () {

        Route::namespace('Templates')->prefix('templates')->group(function () {

            Route::get('', 'ListsController@execute')->name('templates.lists');
            Route::post('', 'CreateController@execute')->name('templates.create');
            Route::get('{template}', 'DetailController@execute')->name('templates.detail');
            Route::patch('{template}', 'UpdateController@execute')->name('templates.update');
            Route::delete('{template}', 'DeleteController@execute')->name('templates.delete');
            Route::post('{template}/assigns', 'AssignController@execute')->name('templates.assign');

        });

        Route::namespace('Checklists')->group(function () {

            Route::get('{checklist}', 'DetailController@execute')->name('checklists.detail');

        });

        Route::namespace('ChecklistItems')->group(function () {

            Route::get('{checklist}/items', 'GetChecklistItemsController@execute')
                ->name('checklist_items.lists');
            Route::get('{checklist}/relationships/items', 'GetRelationshipsChecklistItemsController@execute')
                ->name('checklist_items.relationship_lists');

        });

    });

});



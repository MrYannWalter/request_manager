<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ResponsableController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::middleware(['auth'])->group(function () {
//     Route::get('/mes-requetes', [RequestController::class, 'index'])->name('requests.index');
// });


Route::middleware(['auth'])->group(function() {
    Route::get('/mes-requetes', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/mes-requetes/create', [RequestController::class, 'create'])->name('requests.create');
    Route::post('/mes-requetes', [RequestController::class, 'store'])->name('requests.store');
    Route::delete('/requests/{request}', [RequestController::class, 'destroy'])->name('requests.destroy');
});


Route::middleware(['auth'])->prefix('agent')->name('agent.')->group(function () {
    Route::get('requests/{id}/edit', [AgentController::class, 'edit'])->name('requests.edit');
    Route::put('requests/{id}', [AgentController::class, 'update'])->name('requests.update');
    
});

Route::put('/agent/requests/{id}/mark-as-completed', [AgentController::class, 'markAsCompleted'])->name('agent.requests.markAsCompleted');


Route::get('/agent/assigned-requests', [AgentController::class, 'showAssignedRequests'])->name('agent.assigned.requests')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/responsable/requests', [ResponsableController::class, 'index'])->name('responsable.requests.index');
    Route::post('/responsable/requests/{id}/decision', [ResponsableController::class, 'makeDecision'])->name('responsable.requests.decision');
});


Route::get('/responsable/requests', [ResponsableController::class, 'index'])->name('responsable.requests');



// use App\Http\Controllers\ResponsableRequestController;

// Route::middleware(['auth'])->group(function () {
//     Route::get('/responsable/assigned-requests', [ResponsableRequestController::class, 'index'])
//          ->name('responsable.assigned.requests');
// });

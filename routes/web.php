<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\AdminController;



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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});



Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
});
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');



Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {

    // Afficher la liste des utilisateurs
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    
    // Afficher le formulaire pour créer un utilisateur
    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    
    // Enregistrer un nouvel utilisateur
    Route::post('/users', [AdminController::class, 'store'])->name('users.store');
    
    // Afficher le formulaire pour modifier un utilisateur
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    
    // Mettre à jour un utilisateur
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
    
    // Supprimer un utilisateur
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
});



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/requêtes', [AdminController::class, 'requestsIndex'])->name('requests.index');
    Route::delete('/requêtes/{id}', [AdminController::class, 'destroyRequest'])->name('requests.destroy');
    Route::get('/requêtes/{id}', [AdminController::class, 'show'])->name('requests.show');

});




// use App\Http\Controllers\ResponsableRequestController;

// Route::middleware(['auth'])->group(function () {
//     Route::get('/responsable/assigned-requests', [ResponsableRequestController::class, 'index'])
//          ->name('responsable.assigned.requests');
// });

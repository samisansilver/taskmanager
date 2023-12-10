<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'lastLogin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/submitjob', [\App\Http\Controllers\jobController::class, 'createJob']);
    Route::get('/jobform', [\App\Http\Controllers\jobController::class, 'jobForm'])->name('jobform');

    Route::post('/getjobs', [\App\Http\Controllers\jobController::class, 'getJob'])->name('getjob');
    Route::get('/selectuser', [\App\Http\Controllers\jobController::class, 'selectUser'])->name('selectuser');

    Route::get('/managerjobs', [\App\Http\Controllers\jobController::class, 'getAllJobs']);
    Route::post('/delete/{id}', [\App\Http\Controllers\jobController::class, 'deleteJob']);
    Route::post('/update/{id}', [\App\Http\Controllers\jobController::class, 'updateJob']);
    Route::post('/edit-task/{id}', [\App\Http\Controllers\jobController::class, 'editJob']);
    Route::post('/edit/{id}', [\App\Http\Controllers\jobController::class, 'submitEditJob']);
    Route::get('/archive', [\App\Http\Controllers\jobController::class, 'archiveTasks'])->name('archive')->middleware('checkAdmin');
    Route::post('/unarchive/{id}', [\App\Http\Controllers\jobController::class, 'unArchive']);
    Route::post('/force/{id}', [\App\Http\Controllers\jobController::class, 'markforce']);
    Route::get('/export', [\App\Http\Controllers\jobController::class, 'excelExport'])->name('export');
    });

Route::prefix('/supply')->group( function (){
    Route::get('/newcompany', [\App\Http\Controllers\supplyController::class, 'newCompany'])->name('newsupplier');
    Route::post('/createcompany', [\App\Http\Controllers\supplyController::class, 'createCompany']);
    Route::get('/supplier-list', [\App\Http\Controllers\supplyController::class, 'supplierList'])->name('supplierlist');
    Route::post('/getsupplier', [\App\Http\Controllers\supplyController::class, 'getSupplier'])->name('getsupplier');
    Route::post('/{id}', [\App\Http\Controllers\supplyController::class, 'showData'])->name('showcompany');
    Route::post('/previous-activity/{id}', [\App\Http\Controllers\supplyController::class, 'updatePreAct']);
//    Route::post('/supplier', [\App\Http\Controllers\supplyController::class, 'showData'])->name('showcompany');
});

Route::prefix('/taskgroup')->group( function (){
    Route::get('/newtask', [\App\Http\Controllers\taskGroupController::class, 'newTask'])->name('newtask');
    Route::post('/create-task', [\App\Http\Controllers\taskGroupController::class, 'createTask'])->name('createtask');
    Route::post('/save-tasks', [\App\Http\Controllers\taskGroupController::class, 'saveTasks'])->name('saveTasks');
    Route::get('/testrel', [\App\Http\Controllers\taskGroupController::class, 'testRel']);
    Route::get('/list', [\App\Http\Controllers\taskGroupController::class, 'list'])->name('listtasks');
    Route::get('/showtask/{id}', [\App\Http\Controllers\taskGroupController::class, 'showTask'])->name('showtask');
    Route::post('/delete/{id}', [\App\Http\Controllers\taskGroupController::class, 'deleteGtask'])->name('deletegtask');
    Route::post('/update/{id}', [\App\Http\Controllers\taskGroupController::class, 'updateGtask'])->name('updategtask');
    Route::post('/edit/{id}', [\App\Http\Controllers\taskGroupController::class, 'editGtask'])->name('editgtask');
});



/*
Route::get('/del', function (){
      $gettasks = \App\Models\Job::where('process', 0)->get();
      foreach ($gettasks as $gettask) {
          $gettask->update([
              'process' => 0
          ]);
      }
});*/


require __DIR__.'/auth.php';

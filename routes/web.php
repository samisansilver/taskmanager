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

    Route::get('/getjobs', [\App\Http\Controllers\jobController::class, 'getJob'])->name('getjob');
    Route::get('/selectuser', [\App\Http\Controllers\jobController::class, 'selectUser'])->name('selectuser');

    Route::get('/managerjobs', [\App\Http\Controllers\jobController::class, 'getAllJobs']);
    Route::get('/delete/{id}', [\App\Http\Controllers\jobController::class, 'deleteJob']);
    Route::get('/update/{id}', [\App\Http\Controllers\jobController::class, 'updateJob']);
    Route::get('/edit-task/{id}', [\App\Http\Controllers\jobController::class, 'editJob']);
    Route::get('/edit/{id}', [\App\Http\Controllers\jobController::class, 'submitEditJob']);
    Route::get('/archive', [\App\Http\Controllers\jobController::class, 'archiveTasks'])->name('archive')->middleware('checkAdmin');
    Route::post('/unarchive/{id}', [\App\Http\Controllers\jobController::class, 'unArchive']);
    Route::get('/force/{id}', [\App\Http\Controllers\jobController::class, 'markforce']);
    Route::get('/export', [\App\Http\Controllers\jobController::class, 'excelExport'])->name('export');
    Route::get('/diflogin', [\App\Http\Controllers\ProfileController::class, 'getDifTimeLogin'])->name('diflogin');
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
    Route::get('/newtask', [\App\Http\Controllers\taskGroupController::class, 'newTask'])->name('newtask')->middleware('checkAdmin');
    Route::post('/create-task', [\App\Http\Controllers\taskGroupController::class, 'createTask'])->name('createtask');
    Route::post('/save-tasks', [\App\Http\Controllers\taskGroupController::class, 'saveTasks'])->name('saveTasks');
    Route::get('/testrel', [\App\Http\Controllers\taskGroupController::class, 'testRel']);
    Route::get('/list', [\App\Http\Controllers\taskGroupController::class, 'list'])->name('listtasks');
    Route::get('/showtask/{id}', [\App\Http\Controllers\taskGroupController::class, 'showTask'])->name('showtask');
    Route::post('/delete/{id}', [\App\Http\Controllers\taskGroupController::class, 'deleteGtask'])->name('deletegtask')->middleware('checkAdmin');
    Route::post('/update/{id}', [\App\Http\Controllers\taskGroupController::class, 'updateGtask'])->name('updategtask')->middleware('checkAdmin');
    Route::post('/edit/{id}', [\App\Http\Controllers\taskGroupController::class, 'editGtask'])->name('editgtask')->middleware('checkAdmin');
});

Route::get('/test' , function (){
    $users = \App\Models\User::all();
        foreach ($users as $user) {
            $tasks = \App\Models\Job::where([
                ['user_id', $user->id],
                ['status', 2]
            ])->get();
            $findtasks = count($tasks);
            $receptor = $user->phone;
            $api_key = env('SMS_API');
            $response = \Illuminate\Support\Facades\Http::asForm()->post("https://api.kavenegar.com/v1/$api_key/sms/send.json", [
                    'receptor' => '09197228110',
                    'message' => 'شما تعداد '.$findtasks.' تسک انجام نشده دارید',
            ]);
            return $response->body();
        };
});

/*Route::get('/testsms', function () {
    $api_key = env('SMS_API');

    $response = \Illuminate\Support\Facades\Http::asForm()->post("https://api.kavenegar.com/v1/$api_key/sms/send.json", [
        'receptor' => '09197228110',
        'message' => '543543543543sasaman',
    ]);

    return $response->body();
});*/

Route::get('/testsendsmstask', function (){
    $user = '09197228110';
    $findtasks = 5;
    $receptor = $user;
    $api_key = '41726265533245616A6C646E39382B7A366B635A4E447244444C64333039524530645641456D48777A454D3D';
    $response = \Illuminate\Support\Facades\Http::asForm()->post("https://api.kavenegar.com/v1/$api_key/sms/send.json", [
        'receptor' => '09197228110',
        'message' => 'شما تعداد'.$findtasks.'تسک انجام نشده دارید',
    ]);
    return $response->body();
});

Route::get('/createduetime', function (){
    $updatetask = \App\Models\Job::all();
    foreach ($updatetask as $item) {
        $item->update([
            'due_time' => \Carbon\Carbon::now()
        ]);
    }

    return 'ok';

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

/*Route::get('/score' , function (){
    $score = \Illuminate\Support\Facades\Http::get('https://livescore-api.com/api-client/matches/live.json?key=C5GnQQFxDPS7WFKM&secret=RmYyFQ8UvTDp8EuKKa7A0M7DCZLyFwlw');
    return $score;
});*/

require __DIR__.'/auth.php';

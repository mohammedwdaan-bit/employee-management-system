<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\web_S\userController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboard\TsakDashboardController;
use App\Http\Controllers\dashboard\EmployeeManageController;
use App\Http\Controllers\web_S\TsakController;
use App\Http\Controllers\dashboard\ReportController;
use App\Http\Controllers\Auth\Admincontroller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\admin;
use App\Models\tasks;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

 





Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    
    /*
    |--------------------------------------------------------------------------
    |                          ####  Users ####
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'verified'])->group(function () {
      
    Route::get('/dashboard/User', [TsakController::class, 'index'])->name('dashboard.user');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    #################################### User: Modify task status ################################################################
    
    Route::put('/status/{id}/edit', [TsakController::class, 'update'])->name('status.update');
    #################################### End User: Modify task status ################################################################
    

        // راوتات الملف الشخصي للمستخدم العادي
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    /*
    |--------------------------------------------------------------------------
    |                          ####  Admin ####
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth:admin', 'verified'])->group(function () {

        Route::get('/dashboard/Admin', [TsakDashboardController::class, 'index'])->name('dashboard.admin');

        Route::post('/admin/logout', [Admincontroller::class, 'destroy'])->name('logout.admin');


        #################################### Tasks manage ################################################################

        Route::post('/tasks/store', [TsakDashboardController::class, 'store'])->name('tasks.store');

        Route::put('/tasks/{task}/update', [TsakDashboardController::class, 'update'])->name('tasks.update');
        #################################### End Tasks manage ################################################################



        ####################################  Users manage ################################################################

        Route::get('/view/users', [EmployeeManageController::class, 'create'])->name('users.view');

        Route::post('/store/users', [EmployeeManageController::class, 'store'])->name('users.store');

        Route::delete('/users/delete', [EmployeeManageController::class, 'destroy'])->name('users.delete');

    //    Route::post('/user/show-modal', [EmployeeManageController::class, 'show'])->name('veiw.model');
        Route::get('/users/{id}/edit', [EmployeeManageController::class, 'edit'])->name('users.edit');

        Route::put('/users/{id}', [EmployeeManageController::class, 'update'])->name('users.update');

        #################################### End Users manage ################################################################



        #################################### Tasks reports ################################################################
        Route::get('/index/reports', [ReportController::class, 'index'])->name('index.report');

        Route::post('/tasks/reports', [ReportController::class, 'tasksReport'])->name('tasks.report');
        // Route::get('/tasks/report/pdf', [ReportController::class, 'tasksReportPDF'])->name('tasks.report.pdf');
        #################################### End Tasks reports  ################################################################



        #################################### Admin profile manage ################################################################
               
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        #################################### End Admin profile manage ################################################################

    
    });

    require __DIR__.'/auth.php';

});



















































































// Route::group(
// [
// 	'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ], function(){ 


//             Route::get('/dashboard/User',[TsakController::class,'index'])
//             ->middleware(['auth', 'verified'])->name('dashboard');


            
//           Route::get('/dashboard/Admin',[TsakDashboardController::class,'index'])
//           ->middleware(['auth:admin', 'verified'])->name('dashboard.admin');





// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// require __DIR__.'/auth.php';
    
// });











































































// Route::get('/user', function () {
//     return view('web_S.usera');
// });
          

        // Route::get('/dashboard/User', function () {
        //         $userid=Auth::id();
        //         // $date=date('y-m-d');
        //         $date = date('Y-m-d');

        
        //         // $tasks= DB::table('tasks')
        //         // ->where('user_id',$userid)
        //         // ->get();
        //         // ->where('date_task',date('y-m-d'))->get();
        //         // dd($tasks);
        //         // $tasks = tasks::where('id', $userid)->firstOrFail()->get();
        //          $tasks = tasks::where('user_id', $userid)->get();
        //         // $tasks=tasks::all();
        //         $date=date('Y-m-d');
        //         $task_pending=[];
        //         $task_in_progress=[];
        //         $task_completed=[];
            
        //         foreach($tasks as $task){
        //             if($task->status=='pending'){
        //                 $task_pending[]=$task;
        //             }
        //             elseif($task->status=='in_progress'){
        //                 $task_in_progress[]=$task;
        //             }
        //             elseif($task->status=='completed'){
        //                 $task_completed[]=$task;
        //             }}
        //             // dd($task_pending,$task_in_progress,$task_completed);
        //     return view('web_S.usera',compact('task_pending','task_in_progress','task_completed','date'));
            
        // })->middleware(['auth', 'verified'])->name('dashboard');



        // Route::get('/dashboard/Admin', function () {
        //     $employees = User::all();


        //      $userid=Auth::id();
        //         // $date=date('y-m-d');
        //         $date = date('Y-m-d');

        
        //         // $tasks= DB::table('tasks')
        //         // ->where('user_id',$userid)
        //         // ->get();
        //         // ->where('date_task',date('y-m-d'))->get();
        //         // dd($tasks);
        //         // $tasks = tasks::where('user_id', $userid)->firstOrFail()->get();
        //         //  $tasks = tasks::where('user_id', $userid)->get();
        //         $tasks=tasks::all();
        //         $date=date('Y-m-d');
        //         $task_pending=[];
        //         $task_in_progress=[];
        //         $task_completed=[];
            
        //         foreach($tasks as $task){
        //             if($task->status=='pending'){
        //                 $task_pending[]=$task;
        //             }
        //             elseif($task->status=='in_progress'){
        //                 $task_in_progress[]=$task;
        //             }
        //             elseif($task->status=='completed'){
        //                 $task_completed[]=$task;
        //             }}
        //             // dd($task_pending,$task_in_progress,$task_completed);
        //     return view('Dashboard.dashboard_manger',compact('employees','task_pending','task_in_progress','task_completed','date'));
        // })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');



        // Route::middleware(['auth'])->group(function(){


        //     Route::resource('tasks', TsakController::class);



        // });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
    
// });
// Route::get('/user', function () {
//     return view('web_S.usera');
// });
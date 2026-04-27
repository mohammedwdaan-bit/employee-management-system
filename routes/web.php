<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboard\TsakDashboardController;
use App\Http\Controllers\web_S\TsakController;
use App\Models\admin;
use App\Models\tasks;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });




















// Route::group(
// [
// 	'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ], function(){ 


    


//         Route::get('/dashboard/User', function () {
//                 $userid=Auth::id();
//                 // $date=date('y-m-d');
//                 $date = date('Y-m-d');

        
//                 // $tasks= DB::table('tasks')
//                 // ->where('user_id',$userid)
//                 // ->get();
//                 // ->where('date_task',date('y-m-d'))->get();
//                 // dd($tasks);
//                 // $tasks = tasks::where('id', $userid)->firstOrFail()->get();
//                  $tasks = tasks::where('user_id', $userid)->get();
//                 // $tasks=tasks::all();
//                 $date=date('Y-m-d');
//                 $task_pending=[];
//                 $task_in_progress=[];
//                 $task_completed=[];
            
//                 foreach($tasks as $task){
//                     if($task->status=='pending'){
//                         $task_pending[]=$task;
//                     }
//                     elseif($task->status=='in_progress'){
//                         $task_in_progress[]=$task;
//                     }
//                     elseif($task->status=='completed'){
//                         $task_completed[]=$task;
//                     }}
//                     // dd($task_pending,$task_in_progress,$task_completed);
//             return view('web_S.usera',compact('task_pending','task_in_progress','task_completed','date'));
            
//         })->middleware(['auth', 'verified'])->name('dashboard');


//         Route::get('/dashboard/Admin', function () {
//             $employees = User::all();


//              $userid=Auth::id();
//                 // $date=date('y-m-d');
//                 $date = date('Y-m-d');

        
//                 // $tasks= DB::table('tasks')
//                 // ->where('user_id',$userid)
//                 // ->get();
//                 // ->where('date_task',date('y-m-d'))->get();
//                 // dd($tasks);
//                 // $tasks = tasks::where('user_id', $userid)->firstOrFail()->get();
//                 //  $tasks = tasks::where('user_id', $userid)->get();
//                 $tasks=tasks::all();
//                 $date=date('Y-m-d');
//                 $task_pending=[];
//                 $task_in_progress=[];
//                 $task_completed=[];
            
//                 foreach($tasks as $task){
//                     if($task->status=='pending'){
//                         $task_pending[]=$task;
//                     }
//                     elseif($task->status=='in_progress'){
//                         $task_in_progress[]=$task;
//                     }
//                     elseif($task->status=='completed'){
//                         $task_completed[]=$task;
//                     }}
//                     // dd($task_pending,$task_in_progress,$task_completed);
//             return view('Dashboard.dashboard_manger',compact('employees','task_pending','task_in_progress','task_completed','date'));
//         })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');



//         // Route::middleware(['auth'])->group(function(){


//         //     Route::resource('tasks', TsakController::class);



//         // });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
    
// });



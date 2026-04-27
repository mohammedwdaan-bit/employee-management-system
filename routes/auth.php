<?php
use App\Http\Controllers\Auth\Admincontroller;
use App\Http\Controllers\web_S\TsakController;
use App\Http\Controllers\dashboard\TsakDashboardController;
use App\Http\Controllers\dashboard\EmployeeManageController;


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

////////////////////////////
    // راوت خروج الأدمن يجب أن يكون هنا وليس داخل guest
    // Route::middleware('auth:admin')->group(function () {
    //     Route::post('/admin/logout', [Admincontroller::class, 'destroy'])->name('logout.admin');

    //     Route::post('/tasks/store', [TsakDashboardController::class, 'store'])->name('tasks.store');
    //     // Route::get('/tasks/create', [TsakController::class, 'create'])->name('tasks.create');
    //     //   Route::post('logout', [Admincontroller::class, 'destroy'])->name('logout.admin');

    //     // Route::get('/tasks/modal/{id}', [TsakDashboardController::class, 'getModal']);

    //     // Route::get('/tasks/{task}/edit', [TsakDashboardController::class, 'update'])->name('tasks.edit');
    //     // Route::put('/tasks/{id}', [TsakDashboardController::class, 'update']);
    //     Route::put('/tasks/{task}/update', [TsakDashboardController::class, 'update'])->name('tasks.update');

    //      Route::get('/view/users', [EmployeeManageController::class, 'create'])->name('users.view');

    //      Route::post('/store/users', [EmployeeManageController::class, 'store'])->name('users.store');
    //      Route::delete('/users/delete', [EmployeeManageController::class, 'destroy'])->name('users.delete');


        
        

    // });

    


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    ######################################### User ###########################################

    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login/user', [AuthenticatedSessionController::class, 'store'])->name('login.user');

 

    ######################################### Admin ###########################################
    // Route::post('login/admin', [Admincontroller::class, 'store'])->name('login.admin');
    Route::post('login/admin', [Admincontroller::class, 'store'])->name('login.admin');










    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});


Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');


    
});

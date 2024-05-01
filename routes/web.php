<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AssignRoleToUserController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\User\AllUserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserForgotPasswordController;
use App\Models\Customer;
use App\Models\User;

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

//forget-password
// Route::get('forget-password', [App\Http\Controllers\Frontend\ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [App\Http\Controllers\Frontend\ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [App\Http\Controllers\Frontend\ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('user/register', [IndexController::class, 'usercreate'])->name('user.register.store');

Route::get('/',function () {
    return view('auth.login');
})->name('home');


//User Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');


//user forget-password
Route::get('user-forget-password', [UserForgotPasswordController::class, 'showForgetPasswordForm'])->name('user.forget.password.get');
Route::post('user-forget-password', [UserForgotPasswordController::class, 'submitForgetPasswordForm'])->name('user.forget.password.post'); 
Route::get('user-reset-password/{token}', [UserForgotPasswordController::class, 'showResetPasswordForm'])->name('user.reset.password.get');
Route::post('user-reset-password', [UserForgotPasswordController::class, 'submitResetPasswordForm'])->name('user.reset.password.post');


Route::controller(\App\Http\Controllers\CustomerController::class)->prefix('/customer')->name('customer.')->group(function () {
    Route::get('/status/{id}', 'status')->name('status');
    Route::get('delete/{id}', 'destroy')->name('delete');
    Route::get('/report', 'customerReport')->name('report');
    Route::post('/ajax/report', 'customerAjaxReport')->name('ajax.report');
    Route::get('/view/{id}', 'show')->name('view');
});
Route::controller(\App\Http\Controllers\GalleryController::class)->prefix('/gallery')->name('gallery.')->group(function () {
    Route::get('/status/{id}', 'status')->name('status');
    Route::get('delete/{id}', 'destroy')->name('delete');
});
Route::controller(\App\Http\Controllers\BlogController::class)->prefix('/blog')->name('blog.')->group(function () {
    Route::get('/status/{id}', 'status')->name('status');
    Route::get('delete/{id}', 'destroy')->name('delete');
});
Route::controller(\App\Http\Controllers\AppoinmentController::class)->prefix('/appoinment')->name('appoinment.')->group(function () {
    Route::get('/status/{id}', 'status')->name('status');
    Route::get('delete/{id}', 'destroy')->name('delete');
});
Route::resource('customer', \App\Http\Controllers\CustomerController::class);
Route::resource('gallery', \App\Http\Controllers\GalleryController::class);
Route::resource('blog', \App\Http\Controllers\BlogController::class);
Route::resource('appoinment', \App\Http\Controllers\AppoinmentController::class);
 // Admin All Routes 
 Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
 Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
 Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
 Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
 Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');


//user-role-permission
    // Route::middleware(['auth','role:Super Admin'])->group(function(){

        Route::resource('user', StaffController::class);
        Route::resource('role', RoleController::class);
        Route::resource('assign_role_users', AssignRoleToUserController::class);
        // Route::resource('/permissions', 'PermissionController');
        // Route::resource('/permissions-groups', 'PermissionGroupController');
    // });
    
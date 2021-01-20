<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix'=>'admin', 'namespace'=>"Admin"], function(){
    
    Route::middleware(['admin.guest','middleware'=>'SendVarToView'])->group(function () {
        Route::get('login', 'ProfileController@showLoginForm')->name('admin.login');
        Route::post('login', 'ProfileController@login')->name('admin.postlogin');
        Route::post('login', 'ProfileController@login')->name('admin.postlogin');
        Route::get('roles', 'UserController@roles')->name('admin.roles');
        Route::get('create-role', 'UserController@createRole')->name('admin.create.role');
        Route::post('save-role', 'UserController@saveRole')->name('admin.save.role');
        Route::get('edit-role/{id}', 'UserController@editRole')->name('admin.edit.role');
        Route::post('update-role', 'UserController@updateRole')->name('admin.update.role');
        Route::get('delete-role/{id}', 'UserController@deleteRole')->name('admin.delete.role');
        Route::get('permissions', 'UserController@permissions')->name('admin.permissions');
        Route::get('create-permission', 'UserController@createPermission')->name('admin.create.permission');
        Route::post('save-permission', 'UserController@savePermission')->name('admin.save.permission');
        Route::get('delete-permission/{id}', 'UserController@deletePermission')->name('admin.delete.permission');
        Route::get('role-management', 'UserController@roleManagement')->name('admin.role.management');
        Route::get('add-permission-to-role', 'UserController@addPermiddionToRole')->name('admin.addpermission.role');
        Route::post('attach-permissions-role', 'UserController@attachPermissionToRole')->name('admin.attach.permission.role');
        Route::get('dashboard', 'ProfileController@dashboard')->name('admin.dashboard');
        Route::get('blogs','UserController@blogs')->name('admin.blogs'); 
        Route::get('create-blog','UserController@createBlog')->name('admin.blog.create'); 
        Route::post('add-blog','UserController@saveBlog')->name('admin.blog.save');
        Route::get('employers','UserController@employers')->name('admin.employer');
        Route::get('jobseekers','UserController@jobseekers')->name('admin.jobseekers');
        Route::get('recruiters','UserController@recruiters')->name('admin.recruiters');
        Route::get('bloggers','UserController@bloggers')->name('admin.bloggers');
        Route::get('mentors','UserController@mentors')->name('admin.mentors');

        // Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');


    });


});

// Auth::routes();
// Frontend route.




//End Frontend route.





// landing
// Route::get('/', 'HomeController@index')->name('frontend.index');
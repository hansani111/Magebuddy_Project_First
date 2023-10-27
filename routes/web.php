<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectCredentialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//User
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
require __DIR__ . '/auth.php';

//Admin
Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.admin-layouts.dashboard');
    })->name('admin.dashboard');

    //product
    Route::controller(ProductController::class)->prefix('/admin/dashboard/products')->group(function () {

        Route::get('', 'index')->name('/admin/dashboard/products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('/show/{id}', 'show')->name('products.show');
        Route::get('/edit/{id}', 'edit')->name('products.edit');
        Route::put('/edit/{id}', 'update')->name('products.update');
        Route::delete('/destroy/{id}', 'destroy')->name('products.destroy');

    });

    //project-credential
    Route::controller(ProjectCredentialController::class)->prefix('/admin/dashboard/project-credentials')->group(function () {

        Route::get('', 'index')->name('/admin/dashboard/project-credentials');
        Route::get('create', 'create')->name('project-credentials.create');
        Route::post('store', 'store')->name('project-credentials.store');
        Route::get('/show/{id}', 'show')->name('project-credentials.show');
        Route::get('/edit/{id}', 'edit')->name('project-credentials.edit');
        Route::put('/edit/{id}', 'update')->name('project-credentials.update');
        Route::delete('/destroy/{id}', 'destroy')->name('project-credentials.destroy');

    });
    //employee
    Route::controller(EmployeeController::class)->prefix('/admin/dashboard/employee')->group(function () {

        Route::get('', 'index')->name('/admin/dashboard/employee');
        Route::get('create', 'create')->name('employee.create');
        Route::post('store', 'store')->name('employee.store');
        Route::get('/show/{id}', 'show')->name('employee.show');
        Route::get('/edit/{id}', 'edit')->name('employee.edit');
        Route::put('/edit/{id}', 'update')->name('employee.update');
        Route::delete('/destroy/{id}', 'destroy')->name('employee.destroy');

        // Route::get('/sendMail', 'sendEmail')->name('sendEmail');

    });

});
require __DIR__ . '/adminauth.php';

//emp
Route::middleware('auth:emp')->group(function () {

    Route::get('/emp/dashboard', function () {
        return view('emp.dashboard');
    })->name('emp.dashboard');

    Route::controller(EmployeeController::class)->prefix('/emp/dashboard')->group(function () {

        Route::get('/emp_project', 'emp_project')->name('emp.project-list');
        Route::get('/emp/employee', 'showEmployeeDetails')->name('emp.employee');
        Route::get('/emp/projects', 'showProjectsList')->name('emp.projects');

    });
});

require __DIR__ . '/empauth.php';
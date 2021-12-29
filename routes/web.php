<?php

use Illuminate\Support\Facades\Route;

//

use Illuminate\Support\Facades\Auth;

// Folder Course
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Course\CategoryCourseController;
use App\Http\Controllers\Course\VideoController;

// Folder Product
use App\Http\Controllers\Product\CategoryProductController;
use App\Http\Controllers\Product\ProductController;

// Folder Notification
use App\Http\Controllers\notification\NotificationCourseController;
use App\Http\Controllers\notification\NotificationUserController;
use App\Http\Controllers\notification\NotificationProductController;
use App\Http\Controllers\notification\NotificationReportVideoController;

//
use App\Http\Controllers\User\UserController;

// Statistic
use App\Http\Controllers\Statistic\StatisticControllers;



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [CategoryCourseController::class, 'index'])->name('categoryCourse.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Course
Route::namespace('Course')->group(function () {

    // Category Course
    Route::prefix('categoryCourse')->group(function () {

        Route::get('/categoryCourse', [CategoryCourseController::class, 'index'])->name('categoryCourse.index');
        Route::get('/create', [CategoryCourseController::class, 'create'])->name('categoryCourse.create');
        Route::post('/store', [CategoryCourseController::class, 'store'])->name('categoryCourse.store');
        Route::get('/show/{id}', [CategoryCourseController::class, 'show'])->name('categoryCourse.show');
        Route::get('/edit/{id}', [CategoryCourseController::class, 'edit'])->name('categoryCourse.edit');
        Route::put('/update/{id}', [CategoryCourseController::class, 'update'])->name('categoryCourse.update');
        Route::delete('/delete/{id}', [CategoryCourseController::class, 'destroy'])->name('categoryCourse.delete');


        // Get Courses from Category
        Route::get('id/{id}/get-courses', [CourseController::class, 'getCoursesByCategoryId'])->name('categoryCourse.get.courses.by.category');
    });

    // Course
    Route::prefix('course')->group(function () {

        Route::get('/courses', [CourseController::class, 'index'])->name('Course.index');
        Route::get('/create', [CourseController::class, 'create'])->name('course.create');
        Route::post('/store', [CourseController::class, 'store'])->name('course.store');
        Route::get('/show/{id}', [CourseController::class, 'show'])->name('course.show');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
        Route::put('/update/{id}', [CourseController::class, 'update'])->name('course.update');
        Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('course.delete');

        // Soft Delete
        Route::delete('/soft-delete/{id}', [CourseController::class, 'softDelete'])->name('course.soft.delete');
        Route::get('/back-soft-delete/{id}', [CourseController::class, 'backFromSoftDelete'])->name('course.back.soft.delete');
        Route::get('/soft-delete/show', [CourseController::class, 'softDeleteShow'])->name('course.soft.delete.show');


        // Get Videos from Course
        Route::get('id/{id}/get-video', [VideoController::class, 'getVideosByCourseId'])->name('course.get.video.by.course');
    });

    // Video
    Route::prefix('video')->group(function () {

        Route::get('/videos', [VideoController::class, 'index'])->name('video.index');
        Route::get('/create', [VideoController::class, 'create'])->name('video.create');
        Route::post('/store', [VideoController::class, 'store'])->name('video.store');
        Route::get('/show/{id}', [VideoController::class, 'show'])->name('video.show');
        Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
        Route::put('/update/{id}', [VideoController::class, 'update'])->name('video.update');
        Route::delete('/delete/{id}', [VideoController::class, 'destroy'])->name('video.delete');
    });
});


// Product
Route::namespace('product')->group(function () {

    // Category Product
    Route::prefix('categoryProduct')->group(function () {

        Route::get('/categoryProduct', [CategoryProductController::class, 'index'])->name('categoryProduct.index');
        Route::get('/create', [CategoryProductController::class, 'create'])->name('categoryProduct.create');
        Route::post('/store', [CategoryProductController::class, 'store'])->name('categoryProduct.store');
        Route::get('/show/{id}', [CategoryProductController::class, 'show'])->name('categoryProduct.show');
        Route::get('/edit/{id}', [CategoryProductController::class, 'edit'])->name('categoryProduct.edit');
        Route::put('/update/{id}', [CategoryProductController::class, 'update'])->name('categoryProduct.update');
        Route::delete('/delete/{id}', [CategoryProductController::class, 'destroy'])->name('categoryProduct.delete');

        // Get Product By Category Id
        Route::get('/id/{id}/get-product', [ProductController::class, 'getProductByCategoryId'])->name('categoryProduct.get.product.by.category');

        //Soft Delete
        Route::delete('/soft-delete/{id}', [CategoryProductController::class, 'softDelete'])->name('categoryProduct.soft.delete');
        Route::get('/back-soft-delete/{id}', [CategoryProductController::class, 'backFromSoftDelete'])->name('categoryProduct.back.soft.delete');
        Route::get('/soft-delete/show', [CategoryProductController::class, 'softDeleteShow'])->name('categoryProduct.soft.delete.show');
    });

    // Product
    Route::prefix('product')->group(function () {

        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

        // Soft Delete
        Route::delete('/soft-delete/{id}', [ProductController::class, 'softDelete'])->name('product.soft.delete');
        Route::get('/back-soft-delete/{id}', [ProductController::class, 'backFromSoftDelete'])->name('product.back.soft.delete');
        Route::get('/soft-delete/show', [ProductController::class, 'softDeleteShow'])->name('product.soft.delete.show');
    });
});

// Notification
Route::namespace('notification')->group(function () {

    //
    Route::get('/notification', function () {
        return view('notification.index');
    })->name('notification');

    // User
    Route::group([], function () {

        Route::get('/user-notification', [NotificationUserController::class, 'addUser'])->name('user.add.notification');
        Route::get('/user-acceptance/{id}', [NotificationUserController::class, 'userAcceptance'])->name('user.acceptance.notification');
        Route::get('/user-refused/{id}', [NotificationUserController::class, 'userRefused'])->name('user.refused.notification');
    });

    // Product
    Route::group([], function () {

        Route::get('/product-notification', [NotificationProductController::class, 'addProduct'])->name('product.add.notification');
        Route::get('/product-acceptance/{id}', [NotificationProductController::class, 'productAcceptance'])->name('product.acceptance.notification');
        Route::get('/product-refused/{id}', [NotificationProductController::class, 'productRefused'])->name('product.refused.notification');
    });

    // Report
    Route::get('/report-notification', [NotificationReportVideoController::class, 'report'])->name('report.notification');
});

// User
Route::namespace('user')->group(function () {


    Route::prefix('/user')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/user-show/{id}', [UserController::class, 'show'])->name('user.show');
        // Soft Delete
        Route::post('/soft-delete/{id}', [UserController::class, 'softDelete'])->name('user.soft.delete');
        Route::post('/back-soft-delete/{id}', [UserController::class, 'backFromSoftDelete'])->name('user.back.soft.delete');
        Route::get('/soft-delete/show', [UserController::class, 'softDeleteShow'])->name('user.soft.delete.show');
    });
});

// Dashboard
Route::namespace('dashboard')->group(function () {

    Route::prefix('dashboard')->group(function () {

        Route::get('/dashboard', [StatisticControllers::class , 'userCount'])->name('dashboard');
    });
});

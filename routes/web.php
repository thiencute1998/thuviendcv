<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Viewer\IndexController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\TabHomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\NewController;


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

//Route::get('products', function(Request $request) {
//    $query = \App\Models\Product::query();
//    $products = $query->paginate(5);
//    return view('admin.pages.product.products', compact('products'));
//});

Route::get('admin/login', [AuthController::class, 'index'])->name('login-index');

Route::post('admin/login', [AuthController::class, 'login'])->name('login-auth');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout-auth');


Route::prefix('admin')->middleware(['checkLogin'])->group(function () {
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin-index');

    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin-banner');
        Route::get('/create', [BannerController::class, 'create'])->name('admin-banner-create');
        Route::post('/store', [BannerController::class, 'store'])->name('admin-banner-store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('admin-banner-edit');
        Route::post('/update/{id}', [BannerController::class, 'update'])->name('admin-banner-update');
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('admin-banner-delete');
    });

    Route::prefix('manage')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users');
            Route::get('/create', [UserController::class, 'create'])->name('users-create');
            Route::post('/store', [UserController::class, 'store'])->name('users-store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users-edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users-update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users-delete');
            Route::post('/upload', [UserController::class, 'upload'])->name('users-upload');
        });

        Route::prefix('admins')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admins');
            Route::get('/create', [AdminController::class, 'create'])->name('admins-create');
            Route::post('/store', [AdminController::class, 'store'])->name('admins-store');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admins-edit');
            Route::post('/update/{id}', [AdminController::class, 'update'])->name('admins-update');
            Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('admins-delete');
            Route::post('/upload', [AdminController::class, 'upload'])->name('admins-upload');
            Route::get('/edit-password', [AdminController::class, 'editPassword'])->name('edit-password');
            Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('update-password');
        });

    });

    Route::prefix('configs')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('configs');
        Route::post('/update', [ConfigController::class, 'update'])->name('configs-update');
    });

    //
    Route::prefix('category')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin-category');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin-category-create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin-category-store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin-category-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin-category-update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin-category-delete');
        Route::post('/get-parent', [CategoryController::class, 'getParent'])->name('admin-category-get-parent');
    });

    Route::prefix('tag')->group(function() {
        Route::get('/', [TagController::class, 'index'])->name('admin-tag');
        Route::get('/create', [TagController::class, 'create'])->name('admin-tag-create');
        Route::post('/store', [TagController::class, 'store'])->name('admin-tag-store');
        Route::get('/edit/{id}', [TagController::class, 'edit'])->name('admin-tag-edit');
        Route::post('/update/{id}', [TagController::class, 'update'])->name('admin-tag-update');
        Route::get('/delete/{id}', [TagController::class, 'delete'])->name('admin-tag-delete');
        Route::post('/get-all', [TagController::class, 'getALl'])->name('admin-tag-get-all');
    });

    Route::prefix('post')->group(function() {
        Route::get('/', [PostController::class, 'index'])->name('admin-post');
        Route::get('/create', [PostController::class, 'create'])->name('admin-post-create');
        Route::post('/store', [PostController::class, 'store'])->name('admin-post-store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin-post-edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('admin-post-update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('admin-post-delete');
        Route::post('/get-parent', [PostController::class, 'getParent'])->name('admin-post-get-parent');
        Route::post('/ckeditor/image_upload', [PostController::class, 'ckeditorUpload'])->name('admin-post-ckeditor-upload');
    });

    Route::prefix('calendar')->group(function() {
        Route::get('/', [CalendarController::class, 'index'])->name('admin-calendar');
        Route::get('/create', [CalendarController::class, 'create'])->name('admin-calendar-create');
        Route::post('/store', [CalendarController::class, 'store'])->name('admin-calendar-store');
        Route::get('/edit/{id}', [CalendarController::class, 'edit'])->name('admin-calendar-edit');
        Route::post('/update/{id}', [CalendarController::class, 'update'])->name('admin-calendar-update');
        Route::get('/delete/{id}', [CalendarController::class, 'delete'])->name('admin-calendar-delete');
        Route::post('/ckeditor/image_upload', [CalendarController::class, 'ckeditorUpload'])->name('admin-calendar-ckeditor-upload');
    });

    Route::prefix('link')->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('admin-link');
        Route::get('/create', [LinkController::class, 'create'])->name('admin-link-create');
        Route::post('/store', [LinkController::class, 'store'])->name('admin-link-store');
        Route::get('/edit/{id}', [LinkController::class, 'edit'])->name('admin-link-edit');
        Route::post('/update/{id}', [LinkController::class, 'update'])->name('admin-link-update');
        Route::get('/delete/{id}', [LinkController::class, 'delete'])->name('admin-link-delete');
    });

    Route::prefix('video')->group(function() {
        Route::get('/', [VideoController::class, 'index'])->name('admin-video');
        Route::get('/create', [VideoController::class, 'create'])->name('admin-video-create');
        Route::post('/store', [VideoController::class, 'store'])->name('admin-video-store');
        Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('admin-video-edit');
        Route::post('/update/{id}', [VideoController::class, 'update'])->name('admin-video-update');
        Route::get('/delete/{id}', [VideoController::class, 'delete'])->name('admin-video-delete');
        Route::post('/ckeditor/image_upload', [VideoController::class, 'ckeditorUpload'])->name('admin-video-ckeditor-upload');
    });

    Route::prefix('tabhome')->group(function() {
        Route::get('/', [TabHomeController::class, 'index'])->name('admin-tabhome');
        Route::get('/create', [TabHomeController::class, 'create'])->name('admin-tabhome-create');
        Route::post('/store', [TabHomeController::class, 'store'])->name('admin-tabhome-store');
        Route::get('/edit/{id}', [TabHomeController::class, 'edit'])->name('admin-tabhome-edit');
        Route::post('/update/{id}', [TabHomeController::class, 'update'])->name('admin-tabhome-update');
        Route::get('/delete/{id}', [TabHomeController::class, 'delete'])->name('admin-tabhome-delete');
        Route::post('/ckeditor/image_upload', [TabHomeController::class, 'ckeditorUpload'])->name('admin-tabhome-ckeditor-upload');
    });

    Route::prefix('configs')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('admin-configs');
        Route::post('/update', [ConfigController::class, 'update'])->name('admin-configs-update');
    });

    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('admin-about');
        Route::post('/update', [AboutController::class, 'update'])->name('admin-about-update');
    });

    Route::prefix('email')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\EmailSignUpController::class, 'index'])->name('admin-email');
    });

    Route::prefix('borrowbook')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\BorrowBookController::class, 'index'])->name('admin-borrowbook');
    });

    Route::prefix('new')->group(function() {
        Route::get('/', [NewController::class, 'index'])->name('admin-new');
        Route::get('/create', [NewController::class, 'create'])->name('admin-new-create');
        Route::post('/store', [NewController::class, 'store'])->name('admin-new-store');
        Route::get('/edit/{id}', [NewController::class, 'edit'])->name('admin-new-edit');
        Route::post('/update/{id}', [NewController::class, 'update'])->name('admin-new-update');
        Route::get('/delete/{id}', [NewController::class, 'delete'])->name('admin-new-delete');
        Route::post('/ckeditor/image_upload', [NewController::class, 'ckeditorUpload'])->name('admin-new-ckeditor-upload');
    });

});

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('register', [\App\Http\Controllers\Viewer\UserController::class, 'getRegister'])->name('get-register-user');
Route::post('register', [\App\Http\Controllers\Viewer\UserController::class, 'register'])->name('post-register-user');
Route::get('login', [\App\Http\Controllers\Viewer\UserController::class, 'getLogin'])->name('get-login-user');
Route::post('login', [\App\Http\Controllers\Viewer\UserController::class, 'login'])->name('post-login-user');
Route::get('logout', [\App\Http\Controllers\Viewer\UserController::class, 'logout'])->name('get-logout-user')->middleware('checkUserLogin');
Route::get('edit-password', [\App\Http\Controllers\Viewer\UserController::class, 'editPassword'])->name('edit-password-user')->middleware('checkUserLogin');
Route::post('update-password', [\App\Http\Controllers\Viewer\UserController::class, 'updatePassword'])->name('update-password-user')->middleware('checkUserLogin');

Route::get('great/books',[IndexController::class, 'getAllGreatBook'])->name('get-all-great-book');
Route::get('get-book-borrow', [IndexController::class, 'getBookBorrow'])->name('get-book-borrow');
Route::post('post-book-borrow', [IndexController::class, 'postBookBorrow'])->name('post-book-borrow');
Route::get('get-book-favorite', [IndexController::class, 'getBookFavorite'])->name('get-book-favorite')->middleware('checkUserLogin');
Route::post('add-book-favorite', [IndexController::class, 'addBookFavorite'])->name('add-book-favorite');
Route::post('plus-count-book', [IndexController::class, 'plusCountBook'])->name('plus-count-book');
Route::post('sign-up-email', [IndexController::class, 'signUpEmail'])->name('sign-up-email');

Route::get('/introduce', [IndexController::class, 'getIntroduce'])->name('introduce');
Route::get('/rule', [IndexController::class, 'getRule'])->name('rule');
Route::get('/instruct', [IndexController::class, 'getInstruct'])->name('instruct');
Route::get('/contact', [IndexController::class, 'getContact'])->name('contact');
Route::post('/post-contact', [IndexController::class, 'postContact'])->name('post-contact');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/account/info', [IndexController::class, 'getAccountInfo'])->name('get-account-info');
Route::get('/new/{slug}', [IndexController::class, 'getNew'])->name('get-new');
Route::get('/video/{slug}', [IndexController::class, 'getVideo'])->name('get-video');
Route::get('/all/new', [IndexController::class, 'getAllNew'])->name('get-all-new');
Route::get('/all/video', [IndexController::class, 'getAllVideo'])->name('get-all-video');

Route::get('/{cate}', [IndexController::class, 'getCate'])->name('get-cate');



// Chua dung
//Route::get('event/{event}', [IndexController::class, 'getEventCalendar'])->name('get-event-calendar');
//Route::post('/get-event', [IndexController::class, 'getEvent'])->name('get-event');
//Route::get('/events', [IndexController::class, 'events'])->name('events');
//Route::get('/tag/{post}', [IndexController::class, 'getTag'])->name('tag');
//Route::get('/tim-nha-tho-gan-day', [IndexController::class, 'findChurch'])->name('find-church');
//Route::get('/video/{video}', [IndexController::class, 'getVideo'])->name('get-video');
//Route::get('/danh-sach-giao-hat-xu-ho', [IndexController::class, 'getMap'])->name('get-map');
//Route::get('/{post}', [IndexController::class, 'getPost'])->name('get-post');
//Route::post('/search-post', [IndexController::class, 'searchPost'])->name('search-post');
//Route::get('/search-all-post/{post}', [IndexController::class, 'searchAllPost'])->name('search-all-post');
//Route::post('sign-up-email', [IndexController::class, 'signUpEmail'])->name('sign-up-email');
//Route::post('/plus-view-post', [IndexController::class, 'plusViewPost'])->name('plus-view-post');
//Route::post('/plus-view-event', [IndexController::class, 'plusViewEvent'])->name('plus-view-event');




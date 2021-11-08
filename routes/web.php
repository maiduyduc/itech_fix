<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

Route::prefix('/')->group(function () {

    //trang chủ trang web
    Route::get('/', [
        'as' => 'courses.index',
        'uses' => 'CoursesBrowseController@index'
    ]);

    //danh sách khóa học
    Route::get('/courses', [
        'as' => 'courses.course',
        'uses' => 'CoursesBrowseController@course'
    ]);

    //lọc danh sách khóa học theo danh mục
    Route::get('/courses/{slug}/{id}', [
        'as' => 'courses.list',
        'uses' => 'CoursesBrowseController@list'
    ]);

    //xem thông tin khóa học
    Route::get('/courses/{id}', [
        'as' => 'courses.course_info',
        'uses' => 'CoursesBrowseController@course_info'
    ]);

    //tìm kiếm khóa học
    Route::get('/search', [
        'as' => 'courses.search',
        'uses' => 'CoursesBrowseController@search'
    ]);

    //route liên quan đến người dùng
    Route::prefix('user')->group(function () {
        //trang thông tin cá nhân
        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'UserController@index',
        ]);
        // update thông tin cá nhân
        Route::post('/update/{id}', [
            'as' => 'user.update',
            'uses' => 'UserController@update',
        ]);
        //trang đổi mật khẩu
        Route::get('/password', [
            'as' => 'user.password',
            'uses' => 'UserController@password',
        ]);
        // update mật khẩu
        Route::post('/changePassword', [
            'as' => 'user.changePassword',
            'uses' => 'UserController@changePassword',
        ]);
        // trang danh sách khóa học đã đăng ký
        Route::get('/subscribe', [
            'as' => 'user.subscribe',
            'uses' => 'UserController@subscribe',
        ]);
    });

    //========các route quản lý dành cho admin
    Route::prefix('admin')->group(function () {
        //trang chủ admin
        Route::get('/', [
            'as' => 'admin.dashboard',
            'uses' => 'AdminController@dashboard',
            'middleware' => 'can:view'
        ]);

        //các route về categories
        Route::prefix('categories')->group(function () {
            //trang danh sách category
            Route::get('/', [
                'as' => 'categories.index',
                'uses' => 'CategoryController@index',
                'middleware' => 'can:view' //phân quyền chỉ admin (level 0) mới được xem trang này
            ]);
            //trang thêm category
            Route::get('/create', [
                'as' => 'categories.create',
                'uses' => 'CategoryController@create',
//                'middleware' => 'can:categories-add'
                'middleware' => 'can:view'
            ]);
            //lưu thông tin category vào database
            Route::post('/store', [
                'as' => 'categories.store',
                'uses' => 'CategoryController@store',
                'middleware' => 'can:view'
            ]);
            //trang sửa category
            Route::get('/edit/{id}', [
                'as' => 'categories.edit',
                'uses' => 'CategoryController@edit',
//                'middleware' => 'can:categories-edit'
                'middleware' => 'can:view'
            ]);
            //cập nhật thông tin category
            Route::post('/update/{id}', [
                'as' => 'categories.update',
                'uses' => 'CategoryController@update',
                'middleware' => 'can:view'
            ]);
            //xóa category
            Route::get('/delete/{id}', [
                'as' => 'categories.delete',
                'uses' => 'CategoryController@delete',
//                'middleware' => 'can:categories-delete'
                'middleware' => 'can:view'
            ]);
            //search
            Route::get('/search', [
                'as' => 'categories.search',
                'uses' => 'CategoryController@search',
                'middleware' => 'can:view'
            ]);
            Route::get('/trash', [
                'as' => 'categories.trash',
                'uses' => 'CategoryController@trash',
                'middleware' => 'can:view'
            ]);
            Route::get('/restore/{id}', [
                'as' => 'categories.restore',
                'uses' => 'CategoryController@restore',
                'middleware' => 'can:view'
            ]);
            Route::get('/forceDelete/{id}', [
                'as' => 'categories.forceDelete',
                'uses' => 'CategoryController@forceDelete',
                'middleware' => 'can:view'
            ]);
        });

        //các route về khóa học
        Route::prefix('courses-admin')->group(function () {
            Route::get('/', [
                'as' => 'courses-admin.index',
                'uses' => 'CourseController@index',
//                'middleware' => 'can:course-list'
                'middleware' => 'can:view'
            ]);
            Route::get('/create', [
                'as' => 'courses-admin.create',
                'uses' => 'CourseController@create',
                'middleware' => 'can:view'
            ]);
            Route::post('/store', [
                'as' => 'courses-admin.store',
                'uses' => 'CourseController@store',
                'middleware' => 'can:view'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'courses-admin.edit',
                'uses' => 'CourseController@edit',
                'middleware' => 'can:view'
            ]);
            Route::post('/update/{id}', [
                'as' => 'courses-admin.update',
                'uses' => 'CourseController@update',
                'middleware' => 'can:view'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'courses-admin.delete',
                'uses' => 'CourseController@delete',
                'middleware' => 'can:view'
            ]);
            Route::get('/search', [
                'as' => 'courses-admin.search',
                'uses' => 'CourseController@search',
                'middleware' => 'can:view'
            ]);

        });

        //các route về quản lý người dùng - dành cho admin
        Route::prefix('users')->group(function () {

            Route::get('/', [
                'as' => 'users.index',
                'uses' => 'AdminUserController@index',
                'middleware' => 'can:view'
            ]);
            Route::get('/create', [
                'as' => 'users.create',
                'uses' => 'AdminUserController@create',
                'middleware' => 'can:view'
            ]);
            Route::post('/store', [
                'as' => 'users.store',
                'uses' => 'AdminUserController@store',
                'middleware' => 'can:view'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'users.edit',
                'uses' => 'AdminUserController@edit',
                'middleware' => 'can:view'
            ]);
            Route::post('/update/{id}', [
                'as' => 'users.update',
                'uses' => 'AdminUserController@update',
                'middleware' => 'can:view'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'users.delete',
                'uses' => 'AdminUserController@delete',
                'middleware' => 'can:view'
            ]);
            Route::get('/search', [
                'as' => 'users.search',
                'uses' => 'AdminUserController@search',
                'middleware' => 'can:view'
            ]);
        });

        //các route về roles - vai trò (thử nghiệm, hiện đang không áp dụng vào web)
        Route::prefix('roles')->group(function () {

            Route::get('/', [
                'as' => 'roles.index',
                'uses' => 'AdminRoleController@index',
                'middleware' => 'can:view'
            ]);
            Route::get('/create', [
                'as' => 'roles.create',
                'uses' => 'AdminRoleController@create',
                'middleware' => 'can:view'
            ]);
            Route::post('/store', [
                'as' => 'roles.store',
                'uses' => 'AdminRoleController@store',
                'middleware' => 'can:view'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'roles.edit',
                'uses' => 'AdminRoleController@edit',
                'middleware' => 'can:view'
            ]);
            Route::post('/update/{id}', [
                'as' => 'roles.update',
                'uses' => 'AdminRoleController@update',
                'middleware' => 'can:view'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'roles.delete',
                'uses' => 'AdminRoleController@delete',
                'middleware' => 'can:view'
            ]);
        });

        //các route về permissions - quyền truy cập (thử nghiệm, hiện đang không áp dụng vào web)
        Route::prefix('permissions')->group(function () {

            Route::get('/create', [
                'as' => 'permissions.create',
                'uses' => 'AdminPermissionController@create',
                'middleware' => 'can:view'
            ]);
            Route::post('/store', [
                'as' => 'permissions.store',
                'uses' => 'AdminPermissionController@store',
                'middleware' => 'can:view'
            ]);

        });

    });

    //đăng ký khóa học
    Route::prefix('subscriptions')->group(function () {
        //đăng ký
        Route::get('/subscribe/{id}', [
            'as' => 'subscriptions.subscribe',
            'uses' => 'SubscriptionController@subscribe'
        ]);
        //hủy đăng ký
        Route::get('/unsubscribe/{user_id}/{course_id}', [
            'as' => 'subscriptions.unsubscribe',
            'uses' => 'SubscriptionController@unsubscribe'
        ]);
        //học
        Route::get('/learning/{id}', [
            'as' => 'subscriptions.learning',
            'uses' => 'SubscriptionController@learning',
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route đăng xuất
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('courses.index');
});


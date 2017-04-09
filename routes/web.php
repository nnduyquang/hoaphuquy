<?php

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

Route::get('/', function () {
    return view('frontend.trangchu.index');
});
Route::get('/', 'SanPhamController@getSanPhamTrangChu');
Route::get('/danh-muc/{path}', 'SanPhamController@getAllSanPhamByDanhMuc');
Route::get('/danh-muc/{path1}/{path2}', 'SanPhamController@getSanPhamByPathSanPham');
Route::get('/danh-muc/quan-ao-nam/quan-tay-dai', function () {
    return view('frontend.sanpham.chitietsanpham');
});
Route::get('/sml_login', function () {
    return view('backend.login.login');
});
Route::get('/sml_login', function () {
    if (\Illuminate\Support\Facades\Auth::check())
        return redirect()->intended('sml_admin/dashboard');
    else
        return view('backend.login.login');
});
Route::post('sml_login', 'AuthController@login')->name('login');
Route::get('sml_logout', 'AuthController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::get('sml_admin/dashboard', function () {
        return view('backend.admin.dashboard.dashboard');
    })->name('dashboard');
    Route::resource('sml_admin/users', 'UserController');
    //Role
    Route::get('sml_admin/roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::post('sml_admin/roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
    Route::get('sml_admin/roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
    Route::get('sml_admin/roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
    Route::patch('sml_admin/roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
    Route::delete('sml_admin/roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);
    Route::get('sml_admin/roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    //Danh Mục
    Route::get('sml_admin/danh_muc', ['as' => 'danhmucs.index', 'uses' => 'DanhMucController@index', 'middleware' => ['permission:danhmuc-list|danhmuc-create|danhmuc-edit|danhmuc-delete']]);
    Route::post('sml_admin/danh_muc/create', ['as' => 'danhmucs.store', 'uses' => 'DanhMucController@store', 'middleware' => ['permission:danhmuc-create']]);
    Route::get('sml_admin/danh_muc/create', ['as' => 'danhmucs.create', 'uses' => 'DanhMucController@create', 'middleware' => ['permission:danhmuc-create']]);
    Route::get('sml_admin/danh_muc/{id}/edit', ['as' => 'danhmucs.edit', 'uses' => 'DanhMucController@edit', 'middleware' => ['permission:danhmuc-edit']]);
    Route::patch('sml_admin/danh_muc/{id}', ['as' => 'danhmucs.update', 'uses' => 'DanhMucController@update', 'middleware' => ['permission:danhmuc-edit']]);
    Route::delete('sml_admin/danh_muc/{id}', ['as' => 'danhmucs.destroy', 'uses' => 'DanhMucController@destroy', 'middleware' => ['permission:danhmuc-delete']]);
    //Sản Phẩm
    Route::get('sml_admin/san_pham', ['as' => 'sanphams.index', 'uses' => 'SanPhamController@index', 'middleware' => ['permission:sanpham-list|sanpham-create|sanpham-edit|sanpham-delete']]);
    Route::post('sml_admin/san_pham/create', ['as' => 'sanphams.store', 'uses' => 'SanPhamController@store', 'middleware' => ['permission:sanpham-create']]);
    Route::get('sml_admin/san_pham/create', ['as' => 'sanphams.create', 'uses' => 'SanPhamController@create', 'middleware' => ['permission:sanpham-create']]);
    Route::get('sml_admin/san_pham/{id}/edit', ['as' => 'sanphams.edit', 'uses' => 'SanPhamController@edit', 'middleware' => ['permission:sanpham-edit']]);
    Route::patch('sml_admin/san_pham/{id}', ['as' => 'sanphams.update', 'uses' => 'SanPhamController@update', 'middleware' => ['permission:sanpham-edit']]);
    Route::delete('sml_admin/san_pham/{id}', ['as' => 'sanphams.destroy', 'uses' => 'SanPhamController@destroy', 'middleware' => ['permission:sanpham-delete']]);
    //Slider
    Route::get('sml_admin/slider', ['as' => 'sliders.index', 'uses' => 'SliderController@index', 'middleware' => ['permission:slider-list|slider-create|slider-edit|slider-delete']]);
    Route::post('sml_admin/slider/create', ['as' => 'sliders.store', 'uses' => 'SliderController@store', 'middleware' => ['permission:slider-create']]);
    Route::get('sml_admin/slider/create', ['as' => 'sliders.create', 'uses' => 'SliderController@create', 'middleware' => ['permission:slider-create']]);
    Route::get('sml_admin/slider/{id}/edit', ['as' => 'sliders.edit', 'uses' => 'SliderController@edit', 'middleware' => ['permission:slider-edit']]);
    Route::patch('sml_admin/slider/{id}', ['as' => 'sliders.update', 'uses' => 'SliderController@update', 'middleware' => ['permission:slider-edit']]);
    Route::delete('sml_admin/slider/{id}', ['as' => 'sliders.destroy', 'uses' => 'SliderController@destroy', 'middleware' => ['permission:slider-delete']]);
    //Trang
    Route::get('sml_admin/trang', ['as' => 'trangs.index', 'uses' => 'TrangController@index', 'middleware' => ['permission:trang-list|trang-create|trang-edit|trang-delete']]);
    Route::post('sml_admin/trang/create', ['as' => 'trangs.store', 'uses' => 'TrangController@store', 'middleware' => ['permission:trang-create']]);
    Route::get('sml_admin/trang/create', ['as' => 'trangs.create', 'uses' => 'TrangController@create', 'middleware' => ['permission:trang-create']]);
    Route::get('sml_admin/trang/{id}/edit', ['as' => 'trangs.edit', 'uses' => 'TrangController@edit', 'middleware' => ['permission:trang-edit']]);
    Route::patch('sml_admin/trang/{id}', ['as' => 'trangs.update', 'uses' => 'TrangController@update', 'middleware' => ['permission:trang-edit']]);
    Route::delete('sml_admin/trang/{id}', ['as' => 'trangs.destroy', 'uses' => 'TrangController@destroy', 'middleware' => ['permission:trang-delete']]);
    //Common
    Route::post('sml_admin/common/uploadImage', ['as' => 'common.uploadImage', 'uses' => 'CommonController@uploadImage']);
});

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
use App\Slide;
use App\Product;
Route::get('/', function () {
    $slide = Slide::all();
    $new_product = Product::where('new', 1)->paginate(4, ['*'], 'pag');
    $sale_product = Product::where('promotion_price', '<>',0)->paginate(8);
    return view('page.trangchu', compact('slide', 'new_product', 'sale_product'));
});
Route::get('login',[
	'as' => 'login',
	'uses' => 'PageController@getLogin'
]);
Route::post('login',[
	'as' => 'login',
	'uses' => 'PageController@postLogin'
]);
Route::get('signup',[
	'as' => 'signup',
	'uses' => 'PageController@getSignup' 
]);
Route::post('signup',[
	'as' => 'signup',
	'uses' => 'PageController@postSignup'
]);
Route::get('logout',[
	'as' => 'logout',
	'uses' => 'PageController@getLogout'
]);
Route::get('trang-chu',[
	'as' => 'trangchu',
	'uses' => 'PageController@getTrangChu'
]);
Route::get('loai-san-pham/{type}',[
	'as' => 'loaisanpham',
	'uses' => 'PageController@getLoaiSanPham'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as' => 'chitietsanpham',
	'uses' => 'PageController@getChiTietSanPham'
]);
Route::get('lien-he',[
	'as' => 'lienhe',
	'uses' => 'PageController@getLienHe'
]);
Route::get('gioi-thieu',[
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioiThieu'
]);
Route::get('hosting',[
	'as' => 'hosting',
	'uses' => 'PageController@getHosting'
]);
Route::get('profile',[
	'as' => 'profile',
	'uses' => 'PageController@getProfile'
]);
Route::get('add_to_cart/{id}',[
	'as' => 'themgiohang',
	'uses' => 'PageController@getAddToCart'
]);
Route::get('del_cart/{id}',[
	'as' => 'xoagiohang',
	'uses' => 'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getDatHang'
]);
Route::post('dat-hang',[
	'as' => 'dathang',
	'uses' => 'PageController@postDatHang'
]);
Route::get('seach',[
	'as' => 'seach',
	'uses' => 'PageController@getSeach'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function(){
	Route::group(['prefix' => 'user'], function(){
		//admin/theloai/them
		Route::get('danhsach', 'UserController@getDanhSach');
		Route::get('sua/{id}', 'UserController@getSua');
		Route::post('sua/{id}', 'UserController@postSua');
		Route::get('xoa/{id}', 'UserController@getXoa');
		Route::get('them', 'UserController@getThem'); 
		Route::post('them', 'UserController@postThem');
	});
	Route::group(['prefix' => 'slide'], function(){
		//admin/theloai/them
		Route::get('danhsach', 'SlideController@getDanhSach');
		Route::get('sua/{id}', 'SlideController@getSua');
		Route::post('sua/{id}', 'SlideController@postSua');
		Route::get('xoa/{id}', 'SlideController@getXoa');
		Route::get('them', 'SlideController@getThem');
		Route::post('them', 'SlideController@postThem');
	});
	Route::group(['prefix' => 'khachhang'], function(){
		//admin/theloai/them
		Route::get('danhsach', 'KhachHangController@getDanhSach');
		Route::get('sua/{id}', 'KhachHangController@getSua');
		Route::post('sua/{id}', 'KhachHangController@postSua');
		Route::get('xoa/{id}', 'KhachHangController@getXoa');
	});
	Route::group(['prefix' => 'hoadon'], function(){
		//admin/theloai/them
		Route::get('danhsach', 'HoaDonController@getDanhSach');
		Route::get('chitietHD/{id}', 'HoaDonController@getDanhSachChiTiet');
		Route::get('sua/{id}', 'HoaDonController@getSua');
		Route::post('sua/{id}', 'HoaDonController@postSua');
		Route::get('xoa/{id}', 'HoaDonController@getXoa');
	});
	Route::group(['prefix' => 'sanpham'], function(){
		//admin/theloai/them
		Route::get('danhsach', 'SanPhamController@getDanhSach');
		Route::get('sua/{id}', 'SanPhamController@getSua');
		Route::post('sua/{id}', 'SanPhamController@postSua');
		Route::get('xoa/{id}', 'SanPhamController@getXoa');
		Route::get('them', 'SanPhamController@getThem');
		Route::post('them', 'SanPhamController@postThem');
	});
});

Route::get('admin/login', 'UserController@getdangnhapAdmin');
Route::post('admin/login', 'UserController@postdangnhapAdmin');
Route::get('admin/logout', 'UserController@getdangxuatAdmin');


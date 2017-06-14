<?php
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function() {

	Route::resource('theloai', 'TheLoaiController');

	Route::resource('loaitin', 'LoaiTinController');

	Route::resource('tintuc', 'TinTucController');
	
	Route::resource('user', 'UserController');

	Route::group(['prefix' => 'ajax'], function() {
		//Lấy danh sách loại tin theo idTheLoai
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
	});
});

//Trang đăng nhập admin
Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin')->name('admin.login');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin')->name('admin.login');;
Route::get('admin/logout', 'UserController@getDangXuatAdmin')->name('admin.logout');



Route::get('/', 'PagesController@trangchu')->name('home');
Route::get('lienhe.html', 'PagesController@lienhe')->name('lienhe');
Route::get('loaitin/{id}/{name}.html', 'PagesController@loaitin');
Route::get('tintuc/{id}/{name}.html', 'PagesController@tintuc');

//User đăng nhập
Route::get('dangnhap', 'PagesController@getDangNhap')->name('user.login');
Route::post('dangnhap', 'PagesController@postDangNhap')->name('user.login');
Route::get('dangxuat', 'PagesController@getDangXuat')->name('user.logout');
Route::get('user', 'PagesController@getUser')->name('user.edit');
Route::post('user', 'PagesController@postUser')->name('user.edit');

Route::get('dangki', 'PagesController@getDangKy')->name('user.register');
Route::post('dangki', 'PagesController@postDangKy')->name('user.register');

Route::get('timkiem', 'PagesController@timkiem')->name('search');

Route::get('newpost', 'PagesController@getNewPost')->name('user.post');
Route::post('newpost', 'PagesController@postNewPost')->name('user.post');
Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');

Route::get('resetpassword', 'PagesController@getResetPassword');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/reset', 'Auth\PasswordController@reset');


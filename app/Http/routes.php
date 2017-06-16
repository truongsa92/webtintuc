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
Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin')->name('admin.login')->middleware('switcherLang');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin')->name('admin.login')->middleware('switcherLang');;
Route::get('admin/logout', 'UserController@getDangXuatAdmin')->name('admin.logout')->middleware('switcherLang');


Route::get('/', 'PagesController@trangchu')->name('home')->middleware('switcherLang');
Route::get('lienhe.html', 'PagesController@lienhe')->name('lienhe')->middleware('switcherLang');
Route::get('loaitin/{id}/{name}.html', 'PagesController@loaitin')->name('loaitin')->middleware('switcherLang');
Route::get('tintuc/{id}/{name}.html', 'PagesController@tintuc')->name('tintuc')->middleware('switcherLang');

//User đăng nhập
Route::get('dangnhap', 'PagesController@getDangNhap')->name('user.login')->middleware('switcherLang');
Route::post('dangnhap', 'PagesController@postDangNhap')->name('user.login')->middleware('switcherLang');
Route::get('dangxuat', 'PagesController@getDangXuat')->name('user.logout')->middleware('switcherLang');
Route::get('user', 'PagesController@getUser')->name('user.edit')->middleware('switcherLang');
Route::post('user', 'PagesController@postUser')->name('user.edit')->middleware('switcherLang');

Route::get('dangki', 'PagesController@getDangKy')->name('user.register')->middleware('switcherLang');
Route::post('dangki', 'PagesController@postDangKy')->name('user.register')->middleware('switcherLang');

Route::get('timkiem', 'PagesController@timkiem')->name('search')->middleware('switcherLang');

Route::get('newpost', 'PagesController@getNewPost')->name('user.post')->middleware('userLogin');
Route::post('newpost', 'PagesController@postNewPost')->name('user.post')->middleware('userLogin');
Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');

Route::get('resetpassword', 'PagesController@getResetPassword')->middleware('switcherLang');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail')->middleware('switcherLang');
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm')->middleware('switcherLang');
Route::post('password/reset', 'Auth\PasswordController@reset')->middleware('switcherLang');

Route::post('lang', 'LanguageController@postLang')->name('changeLang')->middleware('switcherLang');

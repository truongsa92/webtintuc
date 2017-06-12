<?php

// Route::get('test', function() {
// 	$user = App\User::find(1);
// 	foreach ($user->tintuc as $tt) {
// 		echo $tt->TieuDe.'<br>';
// 	}
// });

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function() {

	Route::group(['prefix' => 'theloai'], function() {
		Route::get('danhsach', 'TheLoaiController@getDanhSach');

		Route::get('sua/{id}', 'TheLoaiController@getSua');
		Route::post('sua/{id}', 'TheLoaiController@postSua');

		Route::get('them', 'TheLoaiController@getThem');
		Route::post('them', 'TheLoaiController@postThem');

		Route::get('xoa/{id}', 'TheLoaiController@getXoa');
	});

	Route::group(['prefix' => 'loaitin'], function() {
		Route::get('danhsach', 'LoaiTinController@getDanhSach');

		Route::get('sua/{id}', 'LoaiTinController@getSua');
		Route::post('sua/{id}', 'LoaiTinController@postSua');

		Route::get('them', 'LoaiTinController@getThem');
		Route::post('them', 'LoaiTinController@postThem');

		Route::get('xoa/{id}', 'LoaiTinController@getXoa');
	});

	Route::group(['prefix' => 'tintuc'], function() {
		Route::get('danhsach', 'TinTucController@getDanhSach');

		Route::get('sua/{id}', 'TinTucController@getSua');
		Route::post('sua/{id}', 'TinTucController@postSua');

		Route::get('them', 'TinTucController@getThem');
		Route::post('them', 'TinTucController@postThem');

		Route::get('xoa/{id}', 'TinTucController@getXoa');
	});
	
	Route::group(['prefix' => 'user'], function() {
		Route::get('danhsach', 'UserController@getDanhSach');

		Route::get('sua/{id}', 'UserController@getSua');
		Route::post('sua/{id}', 'UserController@postSua');

		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');

		Route::get('xoa/{id}', 'UserController@getXoa');
	});

	Route::group(['prefix' => 'ajax'], function() {
		//Lấy danh sách loại tin theo idTheLoai
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
	});
});

//Trang đăng nhập admin
Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin');
Route::get('admin/logout', 'UserController@getDangXuatAdmin');



Route::get('/', 'PagesController@trangchu');
Route::get('lienhe.html', 'PagesController@lienhe');
Route::get('loaitin/{id}/{name}.html', 'PagesController@loaitin');
Route::get('tintuc/{id}/{name}.html', 'PagesController@tintuc');

//User đăng nhập
Route::get('dangnhap', 'PagesController@getDangNhap');
Route::post('dangnhap', 'PagesController@postDangNhap');
Route::get('dangxuat', 'PagesController@getDangXuat');
Route::get('user', 'PagesController@getUser');
Route::post('user', 'PagesController@postUser');

Route::get('dangki', 'PagesController@getDangKy');
Route::post('dangki', 'PagesController@postDangKy');

Route::get('timkiem', 'PagesController@timkiem');

Route::get('newpost', 'PagesController@getNewPost');
Route::post('newpost', 'PagesController@postNewPost');
Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');

Route::get('resetpassword', 'PagesController@getResetPassword');
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');


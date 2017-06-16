<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Requests\TinTucRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\User;

class PagesController extends Controller
{
	function __construct()
	{
  	$theloai = TheLoai::all();
    $baseSrc = 'upload/tintuc/';
  	view()->share('theloai', $theloai);
    view()->share('baseSrc', $baseSrc);
    if(Auth::check()) {
      view()->share('user', Auth::user());
    }
	}

  public function trangchu()
  {
  	return view('pages.trangchu');
  }

  public function lienhe()
  {
  	return view('pages.lienhe');
  }

  public function loaitin($id, $name)
  {
  	$loaitin = LoaiTin::find($id);
  	$tintuc = TinTuc::getTinTucByIdLoaiTin($id);
  	return view('pages.loaitin', ['loaitin' => $loaitin, 'tintuc' => $tintuc]);
  }

  public function tintuc($id, $name)
  {
  	$tintuc = TinTuc::find($id);
    $tacgia = $tintuc->user->name;
  	$tinNoiBat = TinTuc::getTinNoiBat($id);
  	$tinLienQuan = TinTuc::getTinLienQuan($id);
  	return view('pages.tintuc', 
  		[
        'tacgia'       => $tacgia,  
  			'tintuc'       => $tintuc, 
  			'tinNoiBat'    => $tinNoiBat, 
  			'tinLienQuan'  => $tinLienQuan
  		]);
  }
  // ********************************************************************** //
  //User 
  public function getDangNhap()
  {
    return view('pages.dangnhap');
  }

  public function postDangNhap(UserLoginRequest $request)
  {
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
    {
      return redirect()->route('home');
    } else {
      return redirect()->route('user.login')->with('thongbao', 'Đăng nhập không thành công');
    }
  }

  public function getDangXuat()
  {
    Auth::logout();
    return redirect()->route('user.login');
  }

  public function getUser()
  {
    return view('pages.user');
  }

  public function postUser(UserRequest $request)
  {
    User::updateUser($request, $request->id);
    return redirect()->route('user.edit')->with('thongbao', 'Sửa thông tin thành công');
  }

  public function getDangKy()
  {
    return view('pages.dangki');
  }
  public function postDangKy(UserRequest $request)
  {
    User::saveUser($request);
    return redirect()->route('user.register')->with('thongbao', 'Đăng kí thành công');
  }

  public function timkiem(Request $request)
  { 
    $tintuc = TinTuc::searchTinTuc($request->keyword);
    return view('pages.timkiem', ['tintuc' => $tintuc, 'keyword' => $keyword]);
  }

  public function getNewPost()
  {
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    return view('pages.newpost', ['theloai' => $theloai, 'loaitin' => $loaitin]);
  }
  
  public function postNewPost(TinTucRequest $request)
  {
    TinTuc::saveTinTuc($request);
    return redirect()->route('user.post')->with('thongbao', 'Tin của bạn đã được thêm, hãy chờ admin duyệt!');
  }

  public function getResetPassword()
  {
    return view('pages.resetpassword');
  }
}





















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
  	view()->share('theloai', $theloai);
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
  	$tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
  	return view('pages.loaitin', ['loaitin' => $loaitin, 'tintuc' => $tintuc]);
  }

  public function tintuc($id, $name)
  {
  	$tintuc = TinTuc::find($id);
  	$tinNoiBat = TinTuc::getTinNoiBat($id);
  	$tinLienQuan = TinTUc::getTinLienQuan($id);
  	return view('pages.tintuc', 
  		[
  			'tintuc' => $tintuc, 
  			'tinNoiBat' => $tinNoiBat, 
  			'tinLienQuan' => $tinLienQuan
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
      return redirect('/');
    } else {
      return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công');
    }
  }

  public function getDangXuat()
  {
    Auth::logout();
    return redirect('dangnhap');
  }

  public function getUser()
  {
    return view('pages.user');
  }

  public function postUser(Request $request)
  {
    $this->validate($request,
      [
        'name'          => 'required|min:3',
      ],
      [
        'name.required'          => 'Bạn chưa nhập tên người dùng',
        'name.min'               => 'Tên người dùng phải >=3 kí tự',
      ]
    );
    $user = Auth::user();
    $user->name = $request->name;
    if($request->changePassword === 'on')    
    {
      $this->validate($request,
        [
          'password'      => 'required|min:6',
          'passwordAgain' => 'required|same:password'
        ],
        [
          'password.required'      => 'Bạn chưa nhập mật khẩu',
          'password.min'           => 'Mật khẩu phải >= 6 kí tự',
          'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
          'passwordAgain.same'     => 'Mật khẩu nhập lại không trùng khớp',
        ]
      );
      $user->password = bcrypt($request->password);
    }
    $user->save();
    return redirect('user')->with('thongbao', 'Sửa thông tin thành công');
  }

  public function getDangKy()
  {
    return view('pages.dangki');
  }
  public function postDangKy(UserRequest $request)
  {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->levle = 0;
    $user->save();
    return redirect('dangki')->with('thongbao', 'Đăng kí thành công');
  }

  public function timkiem(Request $request)
  { 
    $keyword = $request->keyword;
    $tintuc = TinTuc::searchTinTuc($keyword);
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
    $tintuc = new TinTuc;
    $tintuc->TieuDe = $request->TieuDe;
    $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    $tintuc->TomTat = $request->TomTat;
    $tintuc->NoiDung = $request->NoiDung;
    $tintuc->NoiBat = $request->NoiBat;

    //Nếu người dùng chọn hình ảnh để upload
    if($request->hasFile('HinhAnh')) {
      $file = $request->file('HinhAnh');
      $name = $file->getClientOriginalName();

      $ext = $file->getClientOriginalExtension();

      //Kiểm tra xem file có phải là ảnh không
      if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png') {
        if (file_exists('upload/tintuc')) {
          $file->move('upload/tintuc', $name);
        }
        $tintuc->Hinh = $name;
      } else {
        $tintuc->Hinh = "";
      }
    } else {
      $tintuc->Hinh = "";
    }
    $tintuc->idLoaiTin = $request->LoaiTin;
    $tintuc->idUser = Auth::user()->id;
    // $tintuc->pending = 1;
    $tintuc->save();

    return redirect('newpost')->with('thongbao', 'Tin của bạn đã được thêm, hãy chờ admin duyệt!');
  }

  public function getResetPassword()
  {
    return view('pages.resetpassword');
  }
}





















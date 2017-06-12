<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{

  public function getThem()
  {
    return view('admin.user.them');
  }

  public function postThem(Request $request)
  {
  	$this->validate($request,
      [
        'name'          => 'required|min:3',
        'email'         => 'required|email|unique:users,email',
        'password'      => 'required|min:6',
        'passwordAgain' => 'required|same:password'
      ],
      [
        'name.required'          => 'Bạn chưa nhập tên người dùng',
        'name.min'               => 'Tên người dùng phải >=3 kí tự',
        'email.required'         => 'Bạn chưa nhập email',
        'email.email'            => 'Bạn chưa nhập đúng định dạng email',
        'email.unique'           => 'Email đã tồn tại',
        'password.required'      => 'Bạn chưa nhập mật khẩu',
        'password.min'           => 'Mật khẩu phải >= 6 kí tự',
        'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
        'passwordAgain.same'     => 'Mật khẩu nhập lại không trùng khớp',
      ]
    );
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->levle = $request->levle;
    $user->save();
    return redirect('admin/user/them')->with('thongbao', 'Thêm user thành công');

  }

  public function getDanhSach()
  {
    $users = User::all();
    return view('admin.user.danhsach', ['users' => $users]);
  }

  public function getXoa($id)
  {
    $user = User::find($id);
    $user->delete();

    return redirect('admin/user/danhsach')->with('thongbao', 'Xoá user thành công');
  }

  public function getSua($id)
  {
    $user = User::find($id);
    return view('admin.user.sua', ['user' => $user]);
  }

  public function postSua(Request $request, $id)
  {

    $this->validate($request,
      [
        'name'          => 'required|min:3',
        'password'      => 'required|min:6',
        'passwordAgain' => 'required|same:password'
      ],
      [
        'name.required'          => 'Bạn chưa nhập tên người dùng',
        'name.min'               => 'Tên người dùng phải >=3 kí tự',
        'password.required'      => 'Bạn chưa nhập mật khẩu',
        'password.min'           => 'Mật khẩu phải >= 6 kí tự',
        'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
        'passwordAgain.same'     => 'Mật khẩu nhập lại không trùng khớp',
      ]
    );
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->levle = $request->levle;
    $user->save();
    return redirect('admin/user/sua/'.$id)->with('thongbao', 'Sửa user thành công');
  }

  public function getDangNhapAdmin()
  {
    return view('admin.login');
  }
  public function postDangNhapAdmin(Request $request)
  { 
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
    {
      return redirect('admin/theloai/danhsach');
    } else {
      return redirect('admin/dangnhap')->with('thongbao', 'Đăng nhập lỗi');
    }
  }

  public function getDangXuatAdmin()
  {
    Auth::logout();
    return redirect('admin/dangnhap');
  }
}

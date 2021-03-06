<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{

  public function create()
  {
    return view('admin.user.them');
  }

  public function store(UserRequest $request)
  {
    User::saveUser($request);
    return redirect()->route('admin.user.create')->with('thongbao', 'Thêm user thành công');
  }

  public function index()
  {
    $users = User::all();
    return view('admin.user.danhsach', ['users' => $users]);
  }

  public function destroy($id)
  {
    User::deleteUser($id);
    return redirect()->route('admin.user.index')->with('thongbao', 'Xoá user thành công');
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('admin.user.sua', ['user' => $user]);
  }

  public function update(UserRequest $request, $id)
  {
    User::updateUser($request, $id);
    return redirect()->route('admin.user.edit', [$id])->with('thongbao', 'Sửa user thành công');
  }

  public function getDangNhapAdmin()
  {
    return view('admin.login');
  }
  public function postDangNhapAdmin(UserLoginRequest $request)
  { 
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
    {
      //Khi riderect về trang này sẽ check user có phải là admin không qua middleware adminLogin
      return redirect()->route('admin.theloai.index');
    } else {
      return redirect()->route('admin.login')->with('thongbao', 'Đăng nhập lỗi');
    }
  }

  public function getDangXuatAdmin()
  {
    Auth::logout();
    return redirect()->route('admin.login');
  }
}

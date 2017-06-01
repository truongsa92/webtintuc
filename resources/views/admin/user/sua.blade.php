@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div> 
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" value="{{$user->name}}" name="name" placeholder="Nhập tên người dùng" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" value="{{$user->email}}" readonly="" name="email" placeholder="Nhập email người dùng" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập password" />
                            </div>
                             <div class="form-group">
                                <label>Password Check</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập password" />
                            </div>
                            <div class="form-group">
                                <label>Levle</label>
                                <div class="radio">
                                  <label><input type="radio" value="2" name="levle"
                                    @if($user->levle === 2)
                                        {{"checked"}}
                                    @endif
                                  >Admin</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="1" name="levle"
                                   @if($user->levle === 1)
                                        {{"checked"}}
                                    @endif
                                  >Mod</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="0" name="levle"
                                   @if($user->levle === 0)
                                        {{"checked"}}
                                    @endif
                                  >Member</label>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function() {
                let idTheLoai = $(this).val()
                $.get("admin/ajax/loaitin/" + idTheLoai, function(data) {
                    $("#LoaiTin").html(data)
                });
            })
        })
    </script>
@endsection
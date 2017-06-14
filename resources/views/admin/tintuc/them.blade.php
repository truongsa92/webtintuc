@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Thêm</small>
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
                        <form action="{{route('admin.tintuc.store')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tên Tiêu Đề" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" name="NoiDung" rows="4" cols="50">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea class="form-control" name="TomTat" rows="4" cols="50">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" class="form-control" name="HinhAnh" id="HinhAnh"/>
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <div class="radio">
                                  <label><input type="radio" value="1" name="NoiBat">Có</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="0" name="NoiBat">Không</label>
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
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

                        {!! Form::open(['route' => ['admin.tintuc.update', $tintuc->id], 'method' => 'PUT',
                            'files' => true ]) !!}
                            {!! Form::label('TheLoai', 'Thể loại') !!}
                            {!! Form::select('TheLoai', $theloai, $idTheLoaiSelected, ['class' => 'form-control'] ) !!}
                            {!! Form::label('LoaiTin', 'Loại Tin') !!}
                            {!! Form::select('LoaiTin', $loaitin, $idLoaiTinSelected, ['class' => 'form-control'] ) !!}

                            {!! Form::label('TieuDe', 'Tiêu đề') !!}
                            {!! Form::text('TieuDe', $tintuc->TieuDe, 
                                                array_merge(
                                                    ['class' => 'form-control'], 
                                                                $attributes = [
                                                                    'Placeholder' => 'Nhập tên tiêu đề',
                                                                ]
                                                            )
                                                        ) !!}
                            {!! Form::label('NoiDung', 'Nội dung') !!}
                            {!! Form::textarea('NoiDung', $tintuc->NoiDung, 
                                                array_merge(
                                                    ['class' => 'form-control'], 
                                                                $attributes = [
                                                                    'Placeholder' => 'Nhập nội dung',
                                                                ]
                                                            )
                                                        ) !!}
                            {!! Form::label('TomTat', 'Tóm tắt') !!}
                            {!! Form::textarea('TomTat', $tintuc->TomTat, 
                                                array_merge(
                                                    ['class' => 'form-control'], 
                                                                $attributes = [
                                                                    'Placeholder' => 'Nhập tóm tắt',
                                                                ]
                                                            )
                                                        ) !!}
                            {!! Form::label('HinhAnh', 'Hình ảnh') !!}
                            <img width="400px" src="{{$baseSrc}}{{$tintuc->Hinh}}">
                            {!! Form::file('HinhAnh', $attributes = [] ) !!}

                            {{ Form::radio('NoiBat', '1',$tintuc->NoiBat === 1 ? true : '') }} Có<br>
                            {{ Form::radio('NoiBat', '0',$tintuc->NoiBat === 0 ? true : '') }} Không<br>

                            {!! Form::submit('Edit', ['class' => 'btn btn-default']) !!} 
                             {!! Form::submit('Reset', ['class' => 'btn btn-default']) !!}   
                        {!! Form::close() !!}
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
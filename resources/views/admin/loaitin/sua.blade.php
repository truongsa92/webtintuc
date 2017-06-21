@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tin
                            <small>{{$loaitin->Ten}}</small>
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
                        {!! Form::open(['route' => ['admin.loaitin.update', $loaitin->id], 'method' => 'PUT']) !!}
                            {!! Form::label('TheLoai', 'Thể loại') !!}
                            {!! Form::select('TheLoai', $tl, $idTheLoai, ['class' => 'form-control'] ) !!}

                            {!! Form::label('Ten', 'Tên loại tin') !!}
                            {!! Form::text('Ten', $loaitin->Ten, 
                                                array_merge(
                                                    ['class' => 'form-control'], 
                                                                $attributes = [
                                                                    'Placeholder' => 'Nhập tên loại tin',
                                                                ]
                                                            )
                                                        ) !!}
                            {!! Form::submit('Edit', ['class' => 'btn btn-default']) !!}   
                            {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}       
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
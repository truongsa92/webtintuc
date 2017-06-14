@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tin
                            <small>Danh sách </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Tên Allias</th>
                                <th>Thể loại</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaitin as $lt )
                            <tr class="even gradeC" align="center">
                                <td>{{$lt->id}}</td>
                                <td>{{$lt->Ten}}</td>
                                <td>{{$lt->TenKhongDau}}</td>
                                <td>{{$lt->theloai->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <form action="{{route('admin.loaitin.destroy' , $lt->id)}}" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><br><a href="{{route('admin.loaitin.edit', $lt->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
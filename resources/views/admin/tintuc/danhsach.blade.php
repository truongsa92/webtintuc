@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Danh sách</small>
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
                                <th>Tiêu đề</th>
                                <th>Tóm tắt</th>
                                <th>Thể loại</th>
                                <th>Loại tin</th>
                                <th>Nổi bật</th>
                                <th>View</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$tt->id}}</td>
                                    <td>
                                        <p>{{$tt->TieuDe}}</p>
                                    </td>
                                    <td>{{$tt->TomTat}}</td>
                                    <td>{{$tt->loaitin->theloai->Ten}}</td>
                                    <td>{{$tt->loaitin->Ten}}</td>
                                    <td>
                                        @if($tt->NoiBat === 0) 
                                            {{"Không"}}
                                        @else
                                            {{"Có"}}
                                        @endif
                                    </td>
                                    <td>{{$tt->SoLuotXem}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                        <form action="{{route('admin.tintuc.destroy' , $tt->id)}}" method="POST">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><br><a href="{{route('admin.tintuc.edit', $tt->id)}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center">
                    {{$tintuc->links()}}
                </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
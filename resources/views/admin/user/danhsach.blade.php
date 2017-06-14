@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Lelve</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->levle === 2) 
                                            {{"admin"}}
                                        @elseif($user->levle === 1)
                                            {{"mod"}}
                                        @else
                                            {{"member"}}
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                        <form action="{{route('admin.user.destroy' , $user->id)}}" method="POST">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><br><a href="{{route('admin.user.edit', $user->id)}}">Edit</a></td>
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
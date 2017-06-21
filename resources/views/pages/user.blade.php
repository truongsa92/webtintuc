@extends('layout.index')

@section('content')

<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
		  	<div class="panel-heading">Thông tin tài khoản</div>
		  	<div class="panel-body">
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
          {!! Form::open(['route' => 'user.edit', 'method' => 'POST']) !!}
          	{!! Form::label('name', 'Họ tên') !!}
          	{!! Form::text('name', $user->name, 
          									array_merge(
          										['class' => 'form-control'], 
															$attributes = [
																'Placeholder' => trans('Username')
															]
														)
													) !!}
						{!! Form::label('email', 'Email') !!}
						{!! Form::text('email', $user->email, 
          									array_merge(
          										['class' => 'form-control'], 
															$attributes = [
																'readonly' => true,
															]
														)
													) !!}
						{!! Form::checkbox('changePassword', '', false, ['id' => 'changePassword']) !!}
						{!! Form::label('changePassword', 'Đổi mật khẩu') !!}
						{!! Form::password('password', 
          									[
          										'class' => 'form-control password',
															'disabled' => true,
														]
													) !!}
						{!! Form::label('passwordAgain') !!}
						{!! Form::password('passwordAgain', 
          									[
          										'class' => 'form-control password',
															'disabled' => true,
														]
													) !!}
						{!! Form::hidden('id', $user->id) !!}
						{!! Form::hidden('check', 'ok') !!}
						{!! Form::submit('Sửa', ['class' => 'btn btn-default']) !!}		
          {!! Form::close() !!}
		  	</div>
		</div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>

@endsection

@section('script')
	<script>
		$(document).ready(function () {
			$('#changePassword').change(function() {
				if($(this).is(':checked')) {
					$('.password').removeAttr('disabled')
				} else {
					$('.password').attr('disabled', '')
				}
			})
		})
	</script>
@endsection


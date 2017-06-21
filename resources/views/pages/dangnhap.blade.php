@extends('layout.index')

@section('content')
<div class="container">
	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
		  	<div class="panel-heading">{{trans('label.login')}}</div>
		  	<div class="panel-body">
		  		@if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
          @endif

          @if(session('thongbao'))
            <div class="alert alert-danger">
                {{session('thongbao')}}
            </div>
          @endif

		    	{!! Form::open(['route' => 'user.login', 'method' => 'POST'], ['class' => 'form-control']) !!}
						{!! Form::label('email', 'Email Address', ['class' => 'form-control']) !!}
						{{ Form::text('email', '', 
							array_merge(
								['class' => 'form-control'], 
								$attributes = [
									'Placeholder' => trans('label.email.placeholder')
								]
							)
							) }}
						{!! Form::label('password', 'Password', ['class' => 'form-control']) !!}
						{!! Form::password('password', 
															[
																'class' => 'form-control', 
															 	'Placeholder' => trans('label.password.placeholder')
															]) !!}
						{!! Form::submit(trans('label.login'), ['class' => 'btn btn-default']) !!}
					{!! Form::close() !!}
					<a style="color: green" href="resetpassword">{{trans('label.password.forget')}}</a>

		  	</div>
		</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>

@endsection
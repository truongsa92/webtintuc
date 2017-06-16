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
		    	<form action="{{route('user.login')}}" method="POST">
					<div>
		    			<label>Email</label>
					  	<input type="text" class="form-control" placeholder="{{trans('label.email.placeholder')}}" name="email" 
					  	>
					</div>
					<br>	
					<div>
		    			<label>{{trans('label.password')}}</label>
					  	<input type="password" class="form-control" placeholder="{{trans('label.password.placeholder')}}" name="password">
					</div>
					<br>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-default">{{trans('label.login')}}
					</button> 
					<a style="color: green" href="resetpassword">{{trans('label.password.forget')}}</a>
		    	</form>
		  	</div>
		</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
@endsection
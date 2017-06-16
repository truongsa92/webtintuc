 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('home')}}">{{trans('label.webname')}}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">{{trans('label.about')}}</a>
                    </li>
                    <li>
                        <a href="{{route('lienhe')}}">{{trans('label.contact')}}</a>
                    </li>
                </ul>

                <form action="{{route('search')}}" method="GET" class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="{{trans('label.search')}}" name="keyword">
			        </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
			        <button type="submit" class="btn btn-default">{{trans('label.search')}}</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    @if(!isset($user))
                        <li>
                            <a href="{{route('user.register')}}">{{trans('label.register')}}</a>
                        </li>
                        <li>
                            <a href="{{route('user.login')}}">{{trans('label.login')}}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('user.post')}}">{{trans('label.new')}}</a>
                        </li>
                        <li>
                        	<a href="{{route('user.edit')}}">
                        		<span class ="glyphicon glyphicon-user"></span>
                        		{{$user->name}}
                        	</a>
                        </li>

                        <li>
                        	<a href="{{route('user.logout')}}">{{trans('label.logout')}}</a>
                        </li>
                    @endif
                </ul>
            </div>          
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
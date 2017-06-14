 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{route('admin.theloai.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Thể loại<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.theloai.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.theloai.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('admin.loaitin.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Loại tin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.loaitin.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.loaitin.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('admin.tintuc.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Tin tức<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.tintuc.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.tintuc.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="{{route('admin.user.index')}}"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.user.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.user.create')}}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
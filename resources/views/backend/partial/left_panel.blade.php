<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ url('/public/backend/') }}/images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ url('/public/backend/') }}/images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Thể loại</h3>
                <li class=""><a href="{{ route('admin.category.list') }}"> <i class="menu-icon fa fa-list"></i>Danh sách thể loại</a></li>
                <li class=""><a href="{{ route('admin.category.add') }}"> <i class="menu-icon fa fa-arrow-circle-o-right"></i>Thêm thể loại</a></li>
                <h3 class="menu-title">Truyện</h3>
                <li class=""><a href="{{ route('admin.post.list') }}"> <i class="menu-icon fa fa-file-text"></i>Danh sách truyện</a></li>
                <li class=""><a href="{{ route('admin.post.add') }}"> <i class="menu-icon fa fa-plus"></i>Thêm truyện</a></li>
                <h3 class="menu-title">Chapter</h3>
                <li class=""><a href="{{ route('admin.chapter.list') }}"> <i class="menu-icon fa fa-file-text"></i>Danh sách chapter</a></li>
                <li class=""><a href="{{ route('admin.chapter.add') }}"> <i class="menu-icon fa fa-plus"></i>Thêm chapter</a></li>
                <h3 class="menu-title">Thành viển</h3>
                <li class=""><a href="{{ route('admin.user.list') }}"> <i class="menu-icon fa fa-users"></i>Danh sách thành viên</a></li>
                <li class=""><a href="{{ route('admin.user.add') }}"> <i class="menu-icon fa fa-user"></i>Thêm thành viên</a></li>
                <h3 class="menu-title">Web config</h3>
                <li class=""><a href="{{ route('admin.user.add') }}"> <i class="menu-icon fa fa-pagelines"></i>Giao diện</a></li>
                <li class=""><a href="{{ route('admin.user.add') }}"> <i class="menu-icon fa fa-bar-chart-o"></i>Seo</a></li>
                <li class=""><a href="{{ route('admin.user.add') }}"> <i class="menu-icon fa fa-arrow-circle-o-right"></i>Thêm thành viên</a></li>
                <li class=""><a href="{{ route('admin.user.add') }}"> <i class="menu-icon fa fa-arrow-circle-o-right"></i>Thêm thành viên</a></li>
                <li class=""><a href="{{ route('admin.user.add') }}"> <i class="menu-icon fa fa-file"></i>Cache manager</a></li>
                <!-- /.menu-title -->
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p>
                @if (Auth::check())
                    {{Auth::user()->name}}
                @endif
            </p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#"><i class="fa fa-th-large"></i> <span>Chuyên mục</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/category/create"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm mới</a></li>
                    <li><a href="/admin/category"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-file-text-o"></i><span>Bài viết</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/article/create"><i class="fa fa-plus-circle" aria-hidden="true"></i>Viết bài mới</a></li>
                    <li><a href="/admin/article"><i class="fa fa-list" aria-hidden="true"></i>Danh sách bài viết</a></li>
                </ul>
            </li>
            <li class="treeview">
                    <a href="#"><i class="fa fa-tags"></i><span>Tag bài viết</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/tag/create"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm mới</a></li>
                        <li><a href="/admin/tag"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a></li>
                    </ul>
                </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-comment"></i><span>Bình luận</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/comment"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-user"></i><span>Người dùng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/user"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a></li>
                </ul>
            </li>
                
        </ul>
        <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
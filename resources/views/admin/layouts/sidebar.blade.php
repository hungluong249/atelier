 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("public/admin/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview {{(Request::segment(2) == 'company')? 'active' : '' }}">
          <a href="{{ url('admin/company') }}"><i class="fa fa-link"></i> <span>Thông tin Công Ty</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="treeview {{(Request::segment(2) == 'banner')? 'active' : '' }}">
          <a href="{{ url('admin/banner') }}"><i class="fa fa-link"></i> <span>Banner</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="treeview {{(Request::segment(2) == 'introduce')? 'active' : '' }}">
          <a href="{{ url('admin/introduce') }}"><i class="fa fa-link"></i> <span>Danh sách bài viết giới thiệu</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="treeview {{(Request::segment(2) == 'library')? 'active' : '' }}">
          <a href="{{ url('admin/library') }}"><i class="fa fa-link"></i> <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        {{-- <li class="treeview {{(Request::segment(2) == 'order')? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Quản lý đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(3) == 'pending')? 'active' : '' }}">
              <a href="{{ url('admin/order/pending') }}">Chờ xác nhận</a>
            </li>
            <li class="{{(Request::segment(3) == 'ongoing')? 'active' : '' }}">
              <a href="{{ url('admin/order/ongoing') }}">Đã xác nhận</a>
            </li>
            <li class="{{(Request::segment(3) == 'complete')? 'active' : '' }}">
              <a href="{{ url('admin/order/complete') }}">Đã hoàn thành</a>
            </li>
            <li class="{{(Request::segment(3) == 'cancel')? 'active' : '' }}">
              <a href="{{ url('admin/order/cancel') }}">Đã bỏ qua</a>
            </li>
          </ul>
        </li> --}}
        <li class="treeview {{(Request::segment(2) == 'blog-category' || Request::segment(2) == 'blog')? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Quản lý bài viết</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'blog-category')? 'active' : '' }}">
              <a href="{{ url('admin/blog-category') }}">Danh mục</a>
            </li>
            <li class="{{(Request::segment(2) == 'blog')? 'active' : '' }}">
              <a href="{{ url('admin/blog') }}">Danh sách</a>
            </li>
          </ul>
        </li>

        <li class="treeview {{(Request::segment(2) == 'trend-category' || Request::segment(2) == 'trend')? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Quản lý xu hướng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'trend-category')? 'active' : '' }}">
              <a href="{{ url('admin/trend-category') }}">Danh mục</a>
            </li>
            <li class="{{(Request::segment(2) == 'trend')? 'active' : '' }}">
              <a href="{{ url('admin/trend') }}">Danh sách</a>
            </li>
          </ul>
        </li>

        {{-- <li class="treeview {{(Request::segment(2) == 'tasting')? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Quản lý thử rượu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'tasting' && Request::segment(3) == '')? 'active' : '' }}">
              <a href="{{ url('admin/tasting') }}">Chờ xử lý</a>
            </li>
            <li class="{{(Request::segment(3) == 'finish')? 'active' : '' }}">
              <a href="{{ url('admin/tasting/finish') }}">Đã hoàn thành</a>
            </li>
          </ul>
        </li> --}}

        {{-- <li class="treeview {{(Request::segment(2) == 'subscribe')? 'active' : '' }}">
          <a href="{{ url('admin/subscribe') }}"><i class="fa fa-link"></i> <span>Subscribe</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> --}}
{{--        <li><a href="{{ route('user-management.index') }}"><i class="fa fa-link"></i> <span>User management</span></a></li>--}}
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
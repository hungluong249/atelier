@extends('admin.layouts.app-template')
@section('content')
<link href="{{ asset("public/admin/css/rateit.css")}}" rel="stylesheet" type="text/css" />
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý sản phẩm
            </h1>
            <ol class="breadcrumb">
                <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
                {{--<li class="active">Product Mangement</li>--}}
            </ol>
        </section>
    @yield('action-content')
    <!-- /.content -->
    </div>
    <script src="{{ asset ("public/admin/js/product.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("public/admin/js/jquery.rateit.js") }}" type="text/javascript"></script>
@endsection

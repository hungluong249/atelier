@extends('admin.banner.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('banner.create') }}">Thêm mới banner</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      <form method="POST" action="">
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th>Giới thiệu</th>
                <th>Sử dụng?</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($banners as $value)
                <tr role="row" class="odd">
                  <td class="sorting_1" style="text-align: center;">{{ HTML::image('storage/app/banners/'.$value->image,'', array('width' => 150)) }}</td>
                  <td class="sorting_1">{{$value->title}}</td>
                  <td class="sorting_1">{{$value->description}}</td>
                  <td class="hidden-xs use-active-{{ $value->id }}">
                    @if($value->is_active != 0)
                    <span class="glyphicon glyphicon-ok"></span>
                    @endif
                  </td>
                  <td>
                    <form class="row" method="POST" action="{{ route('banner.destroy', ['id' => $value->id]) }}" onsubmit = "return confirm('Chắc chắn xoá?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span class="show-btn-active">
                          @if($value->is_active != 0)
                            <a data-url="{{ url('admin/banner') }}" data-id="{{ $value->id }}" href="javascript:void(0)" class="btn btn-warning col-sm-3 col-xs-5 btn-margin btn-deactive-banner">
                            Tắt Banner
                            </a>
                          @else
                            <a data-url="{{ url('admin/banner') }}" data-id="{{ $value->id }}" href="javascript:void(0)" class="btn btn-success col-sm-3 col-xs-5 btn-margin btn-active-banner">
                            Bật Banner
                            </a>
                          @endif
                        </span>

                        <a href="{{ route('banner.edit', ['id' => $value->id]) }}" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                        Sửa
                        </a>
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Xoá
                        </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị  sản phẩm</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection
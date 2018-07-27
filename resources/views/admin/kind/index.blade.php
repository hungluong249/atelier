@extends('admin.kind.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
          @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
          @endif
          @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
          @endif
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('kind.create') }}">Thêm mới nhóm sản phẩm</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('kind.search') }}">
        {{ csrf_field() }}
         @component('admin.layouts.search', ['title' => 'Tìm kiếm'])
          @component('admin.kind.search-panel.two-cols-search-row', ['items' => ['Name'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['title'] : '']])
          @endcomponent
          <br>
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Hình ảnh</th>
                <th>Tên dòng sản phẩm</th>
                <th>Tên Loại sản phẩm</th>
                <th>Sử dụng?</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kinds as $value)
                <tr role="row" class="odd">
                  <td class="sorting_1">
                    {{ HTML::image('storage/app/kind/'.$value->image, '', array('width' => 150)) }}
                  </td>
                  <td>{{$value->title}}</td>
                  <td>{{$value->type_title}}</td>
                  @if($value->is_active == 1)
                  <td class="hidden-xs"><span class="glyphicon glyphicon-ok"></span></td>
                  @else
                  <td class="hidden-xs"></td>
                  @endif
                  <td>
                    <form class="row" method="POST" action="{{ route('kind.destroy', ['id' => $value->id]) }}" onsubmit = "return confirm('Chắc chắn xoá?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('kind.edit', ['id' => $value->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Sửa
                        </a>
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Xoá
                        </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Hình ảnh</th>
                <th>Tên dòng sản phẩm</th>
                <th>Tên Loại sản phẩm</th>
                <th>Sử dụng?</th>
                <th>Hành động</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $kinds->links() }}
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
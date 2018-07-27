@extends('admin.product.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('product.create') }}">Thêm mới sản phẩm</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('product.search') }}">
         {{ csrf_field() }}
         @component('admin.layouts.search', ['title' => 'Tìm kiếm'])
          @component('admin.product.search-panel.two-cols-search-row', ['items' => ['Name'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
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
                <th>Tên sản phẩm</th>
                <th>Giá thành</th>
                <th>Khuyến mại</th>
                <th>Loại sản phẩm</th>
                <th>Nhóm sản phẩm</th>
                <th width="17%">Hành động</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($products as $item)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $item->name }}</td>
                  <td>{{ str_replace(',', '.', number_format($item->price, 0)) }}</td>
                  <td>{{ str_replace(',', '.', number_format($item->discount, 0)) }}</td>
                  <td>{{ (!empty($type_collection[$item->type_id]))? $type_collection[$item->type_id] : '' }}</td>
                  <td>{{ (!empty($kind_collection[$item->kind_id]))? $kind_collection[$item->kind_id] : '' }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('product.destroy', ['id' => $item->id]) }}" onsubmit = "return confirm('Chắc chắn xoá?')">
                        <a class="collapsed col-sm-1" data-toggle="collapse" href="#{{ $item->id }}" aria-expanded="true" aria-controls="messageContent" title="Xem thêm">
                          <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                        </a>

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('product.show', ['id' => $item->id]) }}" class="col-sm-1" title="Chi tiết">
                          <i class="fa fa-eye" aria-hidden="true" style="color: #398439"></i>
                        </a>

                        <a href="{{ route('product.edit', ['id' => $item->id]) }}" class="col-sm-1" title="chỉnh sửa">
                          <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #f0ad4e"></i>
                        </a>

                        <button type="submit" class="col-sm-1" style="border: none; background: none" title="Xóa">
                          <i class="fa fa-trash-o" aria-hidden="true" style="color: red"></i>
                        </button>
                        {{--@endif--}}
                        <a href="{{ route('comment.fetchProductComment', ['id' => $item->id]) }}" class="col-sm-1" title="Bình luận">
                          <i class="fa fa-commenting-o" aria-hidden="true" style="color: #204d74"></i>
                        </a>
                    </form>
                  </td>
              </tr>
              <tr>
                <td colspan="7" class="no_border">
                    <div class="collapse" id="{{ $item->id }}">
                      <div clas="row">
                          <div class="col-md-12">
                              <!-- <strong>Hình ảnh:</strong>
                              <br> -->
                              <?php $image = json_decode($item->image);?>
                              @if(is_array($image) == true)
                                @foreach ($image as $val)
                                  {{ HTML::image('storage/app/products/'.$item->slug.'/'.$val, '', array('width' => 100)) }}
                                @endforeach
                              @else
                                {{ HTML::image('storage/app/'.$item->image, '', array('width' => 100)) }}
                              @endif
                              <br>
                              <strong>Trạng thái:</strong> {{ ($item->is_active == 0)? 'Đang sử dụng' : 'Chưa sử dụng' }}
                              <br>
                              <strong>Hàng còn:</strong> {{ $item->quantity }} Sản phẩm
                              <br>
                              <table class="table table-bordered table-hover dataTable">
                                <th colspan="2" style="background: #CEF3FB; text-align: center;">Thông Số Sản Phẩm</th>
                                <?php $stt = 1 ?>
                                  @foreach($item->template as $k => $val)
                                    <tr style="{{ ($stt % 2 == 0)? 'background: #e6ede3' : '' }}">
                                      <td style="width: 50%;"><strong style="text-transform: capitalize;">{{ $k }}:</strong></td>
                                      <td>{{ $val }}</td>
                                    </tr>
                                  <?php $stt++ ?>
                                  @endforeach
                              </table>
                              <strong>Đánh giá:</strong>
                              {{-- <div class="rateit" data-rateit-value="{{ ($item->rating)? $item->rating : 0 }}"  data-rateit-readonly="true"></div> --}}
                              {{-- ({{ $item->count }} lượt đánh giá) --}}
                          </div>
                      </div>
                    </div>
                </td>
              </tr>
            @endforeach
            </tbody>
            @if(count($products) > 0)
            <tfoot>
              <tr>
                <th>Tên sản phẩm</th>
                <th>Giá thành</th>
                <th>Khuyến mại</th>
                <th>Loại sản phẩm</th>
                <th>Nhóm sản phẩm</th>
                <th>Hành động</th>
              </tr>
            </tfoot>
            @endif
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị {{count($products)}} sản phẩm</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $products->links() }}
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
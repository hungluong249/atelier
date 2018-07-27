@extends('admin.image.base')
@section('action-content')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm mới ảnh</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" role="form" method="POST" action="{{ route('image.store', ['id' => $library_id]) }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="box-body">
            <div class="form-group">
              <label for="avatar" class="col-sm-2 control-label">Chọn hình ảnh</label>
              <div class="col-sm-10">
                <input type="file" id="image" name="image" required>
              </div>
            </div>
            <div class="form-group">
              <label for="description" class="col-sm-2 control-label">Tiêu đề</label>
              <div class="col-sm-10">
                <input type="text" name="description" class="form-control" placeholder="Tiêu đề">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{ url('admin/library') }}" class="btn btn-default pull-left">Quay Lại</a>
            <button type="submit" class="btn btn-info pull-right">Thêm</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
  <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
          </div>
          <form method="POST" action="">
          </form>
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable sortable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th style="text-align: center;">Hình ảnh</th>
                      <th style="text-align: center;">Tiêu Đề</th>
                      <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending" style="text-align: center; padding: 8px;">Hành động</th>
                    </tr>
                  </thead>
                  
                  @foreach($images as $key => $value)
                    <tbody class="treeview ui-sortable-handle" id="<?php echo ($key + 1) . '-' . $value->id ?>">
                    <tr role="row" class="odd">
                      <td>{{ HTML::image('storage/app/library/'.$library->slug.'/'.$value->image,'', array('width' => 150)) }}</td>
                      <td>{{ $value->description }}</td>
                      <td>
                        <form class="row" method="POST" action="{{ route('image.destroy', ['id' => $value->id]) }}" onsubmit = "return confirm('Chắc chắn xoá?')">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a class="btn btn-warning col-sm-4 col-xs-5 btn-margin" data-toggle="collapse" href="#{{ $value->id }}" aria-expanded="true" aria-controls="messageContent" title="Xem thêm">
                            Sửa
                          </a>

                          <button type="submit" class="btn btn-danger col-sm-4 col-xs-5 btn-margin">
                            Xoá
                          </button>
                        </form>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="3" class="no_border">
                        <div class="collapse" id="{{ $value->id }}">
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Thêm mới ảnh</h3>
                              </div>
                              <!-- /.box-header -->
                              <!-- form start -->
                              <form class="form-horizontal" role="form" method="POST" action="{{ route('image.update', ['id' => $value->id]) }}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="library_id" value="{{ $library_id }}">
                                <div class="box-body">
                                  <div class="row">
                                    <div class="col-xs-6">
                                      <div class="form-group" style="margin-right: 0; margin-left: 0">
                                        <label for="image" class="control-label">Chọn hình ảnh</label>
                                        <input type="file" name="image">
                                      </div>
                                    </div>
                                    <div class="col-xs-6">
                                      <div class="form-group" style="margin-right: 0; margin-left: 0">
                                        <label for="description" class="control-label">Tiêu đề</label>
                                        <input type="text" name="description" class="form-control" value="{{ $value->description }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                  <button type="submit" class="btn btn-info pull-right">Cập Nhật</button>
                                </div>
                                <!-- /.box-footer -->
                              </form>
                            </div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  @endforeach
                  
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

<script type="text/javascript">
    $( function() {
        $('.sortable').sortable({
            axis: 'y',
            update: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    data: {
                        sort: data,
                    },
                    method: 'GET',
                    url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/atelier/admin/image/sort",
                });
            }
        });
    } );
</script>

@endsection

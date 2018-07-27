@extends('admin.blog.base')
@section('action-content')
<section class="content">
    <div class="box ">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-4">
                    <a class="btn btn-primary" href="{{ route('blog.create') }}">Thêm mới xu hướng</a>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            <form method="POST" action="{{ route('blog.search') }}">
                {{ csrf_field() }}
                @component('admin.layouts.search', ['title' => 'Tìm kiếm'])
                @component('admin.blog.search-panel.two-cols-search-row', ['items' => ['Name'],
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
                                    <th style="width: 150px">Hình Ảnh</th>
                                    <th>Tên xu hướng</th>
                                    <th>Sử dụng?</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $item)
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><img src="{{ asset('storage/app/' . $item['image']) }}" width="150px"></td>
                                    <td class="sorting_1">{{ $item->title }}</td>
                                    @if($item->is_active != 0)
                                    <td class="hidden-xs"><span class="glyphicon glyphicon-ok"></span></td>
                                    @else
                                    <td class="hidden-xs"></td>
                                    @endif
                                    <td>
                                        <form class="row" method="POST" action="{{ route('blog.destroy', ['id' => $item->id]) }}" onsubmit = "return confirm('Chắc chắn xoá?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{ route('blog.edit', ['id' => $item->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                Sửa
                                            </a>
                                            <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                Xoá
                                            </button>
                                            {{--@endif--}}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @if(count($result) > 0)
                            <tfoot>
                                <tr>
                                    <th>Hình Ảnh</th>
                                    <th>Tên xu hướng</th>
                                    <th>Sử dụng?</th>
                                    <th>Hành động</th>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($result)}} of {{count($result)}} entries</div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{ $result->links() }}
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
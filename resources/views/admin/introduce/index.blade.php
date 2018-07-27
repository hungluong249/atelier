@extends('admin.introduce.base')

@section('action-content')
    <section class="content">
        <div class="box ">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('introduce.create') }}">Thêm mới giới thiệu</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th>Tên bài viết giới thiệu</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $item['title'] }}</td>
                                        <td>
                                            <form class="row" method="POST" action="{{ route('introduce.destroy', ['id' => $item['id']]) }}" onsubmit = "return confirm('Chắc chắn xoá?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="{{ route('introduce.edit', ['id' => $item['id']]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
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
                                        <th>Tên bài viết giới thiệu</th>
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
@endsection

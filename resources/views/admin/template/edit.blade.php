@extends('admin.template.base')

@section('action-content')
<style type="text/css">
    .btn-config-close:hover{
        color: red;
        cursor: pointer;
    }
</style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Cập nhật cấu hình</div>
                    @if(Session::has('error'))
                        <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('template.update', ['id' => $detail->id]) }}" enctype="multipart/form-data" id="config-form">
                            {{ csrf_field() }}
                            <div class="content-config">
                                <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                                    <label for="total" class="col-md-2 control-label">Thêm Số Fields</label>

                                    <div class="col-md-7">
                                        <input type="number" class="form-control" name="total" value="{{ old('total') }}" id="total" autofocus>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-primary" id="btn-total">ok</a>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-2 control-label">Tên Cấu Hình</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control config-validate" name="name" value="{{ $detail->name }}" >

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @foreach($detail['title'] as $key => $value)

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} remove-config">
                                    <label for="title" class="col-md-2 control-label">Thông Số {{ $key + 1 }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control config-validate" name="title[{{ $key }}]" value="{{ $value }}" data-child="{{ $key }}">

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-1" style="padding-top: 7px">
                                        <i class="fa fa-times-circle btn-config-close" aria-hidden="true"></i>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            <div class="form-group">
                                <div class="col-md-1 col-md-offset-9">
                                    <button type="submit" class="btn btn-primary btn-submit-config">
                                        Cập Nhật
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

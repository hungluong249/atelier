@extends('admin.banner.base')

@section('action-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Cập nhật Banner</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('banner.update', ['id' => $detail->id]) }}" enctype="multipart/form-data">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-2 control-label">Tiêu đề</label>
                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $detail->title }}" autofocus>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="col-md-2 control-label" >Hình ảnh đang sử dụng</label>
                                <div class="col-md-8">
                                    <img src="{{ asset('storage/app/banners/'. $detail->image) }}" width="150">
                                </div>
                            </div>
                            <div class="form-group"{{ $errors->has('image') ? ' has-error' : '' }}>
                                <label for="avatar" class="col-md-2 control-label" >Hình ảnh</label>
                                <div class="col-md-8">
                                    <input type="file" id="image" name="image">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-2 control-label">Giới thiệu</label>
                                <div class="col-md-8">
                                    <textarea id="description" type="text" class="form-control" name="description" value="" rows="8">{{ $detail->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-primary">
                                        Cập nhật
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

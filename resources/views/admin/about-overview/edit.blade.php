@extends('admin.about-overview.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Cập nhật thông tin Giới thiệu chung</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('about-overview.update', ['id' => $detail->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-2 control-label">Giới thiệu</label>

                                <div class="col-md-8">
                                    <textarea id="description" rows="10" class="form-control" name="description" value="{{ old('description') }}" >{{ $detail->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-md-2 control-label">Hình ảnh 1 đang dùng</label>
                                <div class="col-md-8">
                                    <img src="{{ asset('storage/app/about-overview/'. $detail->image_one) }}" width="250">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('image_1') ? ' has-error' : '' }}">
                                <label for="image_1" class="col-md-2 control-label">Hình ảnh 1</label>
                                <div class="col-md-8">
                                    <input type="file" id="image_1" name="image_1">
                                    @if ($errors->has('image_1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image_1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-md-2 control-label">Hình ảnh 2 đang dùng</label>
                                <div class="col-md-8">
                                    <img src="{{ asset('storage/app/about-overview/'. $detail->image_two) }}" width="250">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('image_2') ? ' has-error' : '' }}">
                                <label for="image_2" class="col-md-2 control-label">Hình ảnh 2</label>
                                <div class="col-md-8">
                                    <input type="file" id="image_2" name="image_2">
                                    @if ($errors->has('image_2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image_2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
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
    </section>
@endsection

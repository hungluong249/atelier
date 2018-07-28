@extends('admin.about-overview.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin Giới thiệu chung</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">
                                <label for="map" class="col-md-2 control-label">Giới thiệu</label>

                                <div class="col-md-8">
                                    <textarea id="description" rows="10" class="form-control" name="description" value="{{ old('description') }}" readonly >{!! strip_tags($detail->description) !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-2 control-label">Hình ảnh 1</label>
                                <div class="col-md-8">
                                    <img src="{{ asset('storage/app/about-overview/'. $detail->image_one) }}" width="250">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-2 control-label">Hình ảnh 2</label>
                                <div class="col-md-8">
                                    <img src="{{ asset('storage/app/about-overview/'. $detail->image_two) }}" width="250">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <a href="{{ route('about-overview.edit', ['id' => $detail['id']]) }}" class="btn btn-primary">Sửa</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.company.base')

@section('action-content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Cập nhật thông tin công ty</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('company.update', ['id' => $detail->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="oldMap" class="col-md-2 control-label">Bản đồ đang dùng</label>

                                <div class="col-md-8">
                                    {!! $detail->map !!}
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">
                                <label for="map" class="col-md-2 control-label">Iframe bản đồ</label>

                                <div class="col-md-8">
                                    <textarea id="map" rows="5" class="form-control" name="map" value="{{ old('map') }}">{{ $detail->map }}</textarea>
                                    @if ($errors->has('map'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('map') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-2 control-label">Địa chỉ</label>
                                    
                                <div class="col-md-8">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $detail->address }}">
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-2 control-label">Điện thoại</label>
                                    
                                <div class="col-md-8">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $detail->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-2 control-label">Email</label>
                                    
                                <div class="col-md-8">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $detail->email }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
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
    </div>
@endsection

@extends('admin.company.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin công ty</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">
                                <label for="map" class="col-md-2 control-label">Bản đồ</label>

                                <div class="col-md-8">
                                    {!! $detail->map !!}
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-2 control-label">Địa chỉ</label>
                                    
                                <div class="col-md-8">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $detail->address }}" readonly>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-2 control-label">Điện thoại</label>
                                    
                                <div class="col-md-8">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $detail->phone }}" readonly>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-2 control-label">Email</label>
                                    
                                <div class="col-md-8">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $detail->email }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <a href="{{ route('company.edit', ['id' => $detail['id']]) }}" class="btn btn-primary">Sửa</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

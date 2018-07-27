@extends('admin.intro-product.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Giới thiệu sản phẩm</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('intro-product.update', ['id' => $detail->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                <label for="sub_title" class="col-md-2 control-label">Hightlight</label>
                                    
                                <div class="col-md-8">
                                    <textarea id="sub_title" rows="5" class="form-control" name="sub_title" value="{{ old('sub_title') }}" >{{ $detail->sub_title }}</textarea>
                                    @if ($errors->has('sub_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
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

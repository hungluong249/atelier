@extends('admin.intro-product.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Giới thiệu sản phẩm</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                <label for="sub_title" class="col-md-2 control-label">Hightlight</label>
                                    
                                <div class="col-md-8">
                                    <textarea id="sub_title" rows="5" class="form-control" name="sub_title" value="{{ old('sub_title') }}" readonly >{{ $detail->sub_title }}</textarea>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-2 control-label">Giới thiệu</label>
                                    
                                <div class="col-md-8">
                                    <textarea id="description" rows="10" class="form-control" name="description" value="{{ old('description') }}" readonly >{!! strip_tags($detail->description) !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <a href="{{ route('intro-product.edit', ['id' => $detail->id]) }}" class="btn btn-primary">Sửa</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

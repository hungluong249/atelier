@extends('admin.product.base')

@section('action-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Chỉnh sửa sản phẩm <strong style="color:red">{{ $product->name }}</strong></div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#basi" aria-controls="basi" role="tab" data-toggle="tab">Thông Tin Cơ Bản</a></li>
                            <li role="presentation"><a href="#config" aria-controls="config" role="tab" data-toggle="tab">Cấu Hình Sản Phẩm</a></li>
                        </ul>

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="basi">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="margin-top: 20px">
                                        <label for="name" class="col-md-2 control-label">Tên sản phẩm</label>
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label for="type" class="col-md-2 control-label">Loại sản phẩm</label>

                                        <div class="col-md-4">
                                            <select name="type_id"  class="form-control type" data-page="{{ $product->kind_id }}" >
                                                <option value="">---------------------Chọn loại sản phẩm---------------------</option>
                                                @foreach($type as $value)
                                                    <option value="{{ $value->id }}" {{ ($value->id == $product->type_id)? 'selected' : ''}} >{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('kind') ? ' has-error' : '' }}">
                                        <label for="kind" class="col-md-2 control-label">Nhóm sản phẩm</label>

                                        <div class="col-md-4">
                                            <select name="kind_id"  class="form-control kind"  data-page="{{ $product->trademark_id }}" data-id="{{ $product->kind_id }}" >
                                                <option class="kind_option" value="">-------------------Chọn loại sản phẩm trước -------------------</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-2 control-label">Slug</label>
                                        <div class="col-md-8">
                                            <input id="slug" type="text" class="form-control" name="slug" value="{{ $product->slug }}"  readonly>
                                            @if ($errors->has('slug'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="avatar" class="col-md-2 control-label" >Hình ảnh đang sử dụng</label>
                                        <div class="col-md-6">
                                            <?php $image = json_decode($product->image);?>
                                            @if(is_array($image) == true)
                                                @foreach ($image as $val)
                                                <div style="position: relative; width: 150px; float: left; margin-right: 5%;">
                                                    <button type="button" class="close remove-image" aria-label="Close" style="position: absolute; top: -10px; right: 5px; background: red; border-radius: 50%; padding: 0 7px 3px" title="Xóa" data-image="{{$val}}" data-id="{{$product->id}}">
                                                        <span aria-hidden="true" style="cursor: pointer;">&times;</span>
                                                    </button>
                                                        {{ HTML::image('storage/app/products/'.$product->slug.'/'.$val, '', array('width' => 100)) }}
                                                </div>
                                                @endforeach
                                            @else
                                                {{ HTML::image('storage/app/'.$product->image, '', array('width' => 150)) }}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="avatar" class="col-md-2 control-label" >Hình ảnh</label>
                                        <div class="col-md-6">
                                            <input type="file" id="image" name="image[]" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="is_active" class="col-md-2 control-label" >Tạm thời chưa sử dụng</label>
                                        <div class="col-md-8">
                                            <input type="checkbox" id="is_active" name="is_active" value="1" {{ ($product->is_active == 1)? '' : 'checked' }} >
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                        <label for="quantity" class="col-md-2 control-label">Số lượng sản phẩm</label>
                                        <div class="col-md-4">
                                            <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" >
                                            @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-1 control-label"><strong>Sản phẩm</strong></div>
                                    </div>

                                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                        <label for="price" class="col-md-2 control-label">Đơn giá (VNĐ)</label>
                                        <div class="col-md-4">
                                            <input id="price" type="text" class="form-control price_shared" name="price" value="{{ $product->price }}" >
                                            @if ($errors->has('price'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-1 control-label"><strong>VNĐ</strong></div>
                                    </div>
                                    <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                    <label for="discount" class="col-md-2 control-label">Giảm giá (VNĐ)</label>
                                    <div class="col-md-4">
                                        <input id="discount" type="text" class="form-control price_shared" name="discount" value="{{ $product->discount }}" >
                                        @if ($errors->has('discount'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('discount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-1 control-label"><strong>VNĐ</strong></div>
                                </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-2 control-label">Giới thiệu</label>

                                        <div class="col-md-8">
                                            <textarea id="description" rows="10" class="form-control" name="description" value="{{ old('description') }}">{{ $product->description }}</textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                        <label for="content" class="col-md-2 control-label">Nội dung</label>

                                        <div class="col-md-8">
                                            <textarea id="content" rows="10" class="form-control tinymce" name="content">{{ $product->content }}</textarea>

                                            @if ($errors->has('content'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="config">
                                    <div class="form-group{{ $errors->has('template_id') ? ' has-error' : '' }}" style="margin-top: 20px">
                                        <label for="template_id" class="col-md-2 control-label">Cấu Hình</label>

                                        <div class="col-md-4">
                                            <select name="template_id"  class="form-control template_id" >
                                                <option value="">---------------------Chọn cấu hình---------------------</option>
                                                @foreach($template as $value)
                                                <option value="{{ $value->id }}" {{ ($product->template_id == $value->id)? "selected" : "" }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="template-content">
                                        @foreach($product->template as $key => $value)
                                            <div class="form-group">
                                                <label for="name" class="col-md-2 control-label">{{ $key }}</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="template_content[]" value="{{ $value }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-9">
                                            <button type="submit" class="btn btn-primary">
                                                Cập Nhật
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

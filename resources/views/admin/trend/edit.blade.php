@extends('admin.trend.base')

@section('action-content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Cập nhật xu hướng</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('trend.update', ['id' => $detail['id']]) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-2 control-label">Tên xu hướng</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $detail['title'] }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Slug</label>

                                <div class="col-md-8">
                                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $detail['slug'] }}" required readonly>

                                    @if ($errors->has('slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-2 control-label">Danh mục</label>

                                <div class="col-md-8">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Chọn danh mục</option>
                                        @if(!empty($categories))
                                            @foreach($categories as $key => $item)
                                                <option value="{{ $key }}"
                                                        @if ($detail['category_id'] == $key) selected="selected" @endif>
                                                    {{ $item }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                <label for="is_active" class="col-md-2 control-label">Dùng xu hướng?</label>

                                <div class="col-md-8">
                                    <input id="is_active" type="checkbox" class="minimal" name="is_active" value="1"
                                           @if($detail['is_active'] == 1)
                                           checked
                                            @endif
                                    >
                                    @if ($errors->has('is_active'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('is_active') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="avatar" class="col-md-2 control-label" >Hình ảnh đang sử dụng</label>
                                <div class="col-md-6">
                                    <?php $image = json_decode($detail->image);?>
                                    @if(is_array($image) == true)
                                    @foreach ($image as $val)
                                    <div style="position: relative; width: 150px; float: left; margin-right: 5%;">
                                        <button type="button" class="close remove-image" aria-label="Close" style="position: absolute; top: -10px; right: 5px; background: red; border-radius: 50%; padding: 0 7px 3px" title="Xóa" data-image="{{$val}}" data-id="{{$detail->id}}">
                                            <span aria-hidden="true" style="cursor: pointer;">&times;</span>
                                        </button>
                                        {{ HTML::image('storage/app/trends/'.$detail->slug.'/'.$val, '', array('width' => 100)) }}
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-md-2 control-label" >Hình ảnh</label>
                                <div class="col-md-8">
                                    <input type="file" id="image" name="image[]" multiple>
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-2 control-label">Giới thiệu ngắn</label>

                                <div class="col-md-8">
                                    <textarea id="description" rows="10" class="form-control" name="description" value="{{ old('description') }}">{{ $detail['description'] }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-2 control-label">Thông tin chi tiết</label>

                                <div class="col-md-8">
                                    <textarea id="content" rows="10" class="form-control tinymce" name="content" value="{{ old('content') }}">{{ $detail['content'] }}</textarea>

                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        OK
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

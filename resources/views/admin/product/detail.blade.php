@extends('admin.product.base')
@section('action-content')

<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-9">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Chi Tiết Sản Phẩm</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="detail-image col-md-12">
							<label>Hình Ảnh</label>
							<div class="row">
								@if($detail['image'])
									@foreach(json_decode($detail['image']) as $key => $value)
									<div class="item col-md-4">
										<div class="mask-sm">
											<img src="{{ asset('storage/app/products/'. $detail['slug'] .'/'. $value) }}" alt="Image Detail" width="100%">
										</div>
									</div>
									@endforeach
								@endif
							</div>
						</div>
						<div class="detail-info col-md-12">
							<div class="table-responsive">
								<label><h2>Thông Tin Sản Phẩm</h2></label>
								<table class="table table-striped">
									<tbody><tr>
										<th colspan="2"><h3>Thông Tin Cơ Bản</h3></th>
									</tr>
									<tr>
										<th width=25%>Tên Sản Phẩm</th>
										<td>{{ $detail['name'] }}</td>
									</tr>
									<tr>
										<th>Loại Sản Phẩm</th>
										<td>{{ $type['title'] }}</td>
									</tr>
									<tr>
										<th>Nhóm Sản Phẩm</th>
										<td>{{ $kind['title'] }}</td>
									</tr>
									<tr>
										<th>Giá Thành</th>
										<td>{{ number_format($detail['price']) }} <strong>&nbsp&nbsp VND</strong></td>
									</tr>
									<tr>
										<th>Khuyến Mại</th>
										<td>{{ number_format($detail['discount']) }} <strong>&nbsp&nbsp VND</strong></td>
									</tr>
									<tr>
										<th>Hàng Còn</th>
										<td>{{ $detail['quantity'] }} <strong>&nbsp&nbsp Sản phẩm</strong></td>
									</tr>
									<tr>
										<th>Trạng Thái</th>
										<td>
											@if($detail['is_active']  == 0)
												<span class="label label-success">Đang sử dụng</span>
											@else
												<span class="label label-warning">Không sử dụng</span>
											@endif
										</td>
									</tr>
									<tr>
										<th>Mô Tả</th>
										<td>{{ $detail['description'] }}</td>
									</tr>
									<tr>
										<th>Nội Dung</th>
										<td>{!! $detail['content'] !!}</td>
									</tr>
									<tr>
										<th colspan="2"><h3>Thông Tin Chi Tiết</h3></th>
									</tr>
									@if(!empty($detail['template']))
										@foreach($detail['template'] as $key => $value)
											<tr>
												<th style="text-transform: capitalize;">{{ $key }}</th>
												<td>{{ $value }}</td>
											</tr>
										@endforeach
									@endif
								</tbody></table>
							</div>
						</div>
					</div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3">
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Chỉnh Sửa Thông Tin</h3>
				</div>
				<div class="box-body">
					<a href="{{ route('product.edit', ['id' => $detail['id']]) }}" class="btn btn-warning" role="button">Chỉnh Sửa</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<!-- END ACCORDION & CAROUSEL-->
</section>

@endsection
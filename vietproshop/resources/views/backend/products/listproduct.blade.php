@extends('backend/master/master')
@section('title', 'Product')
	

@section('main')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">

								@if(session("alert"))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>{{session("alert")}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								@endif

								<a href="/admin/product/create" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Tình trạng</th>
											<th>Danh mục</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($products as $prd)
											<tr>
											<td>{{$prd->id}}</td>
											<td>
												<div class="row">
													<div class="col-md-3"><img src="/uploads/{{$prd->image}}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
														<p><strong>Mã sản phẩm : {{$prd->code}}</strong></p>
														<p>Tên sản phẩm :{{$prd->name}}</p>
														
														
													</div>
												</div>
											</td>
											<td>{{$prd->price}} VND</td>
											<td>
												@if ($prd->state ==1)
												<a class="btn btn-success" href="#" role="button">Còn hàng</a>		
												@else
												<a class="btn btn-danger" href="#" role="button">hết hàng</a>										
												@endif
											</td>
											<td>{{$prd->category->name}}</td>
											<td>
												<a href="../admin/product/edit/{{$prd->id}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="../admin/product/delete/{{$prd->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
											</tr>
										@endforeach
										

									</tbody>
								</table>
								<div align='right'>
									{{-- <ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">Trở lại</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">tiếp theo</a></li>
									</ul> --}}
									{{$products->links("pagination::bootstrap-4")}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->

			<!-- javascript -->
			<script src="js/jquery-1.11.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/chart.min.js"></script>
			<script src="js/chart-data.js"></script>
			
			
			
			@endsection
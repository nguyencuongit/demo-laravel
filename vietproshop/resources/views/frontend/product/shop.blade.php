@extends('frontend/master/master')
@section('title', "VIETPRO STORE")
	

	

@section('main')
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<div class="row row-pb-lg">
							@foreach ($product as $prd)
								
							
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(../uploads/{{$prd["image"]}});">

										<div class="cart">
											<p>
												<span class="addtocart"><a href="/cart/addcart/{{$prd["id"]}}"><i
															class="icon-shopping-cart"></i></a></span>
												<span><a href="/product/{{$prd["id"]}}"><i class="icon-eye"></i></a></span>


											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="detail.html">{{$prd["name"]}}</a></h3>
										<p class="price"><span>{{$prd["price"]}} đ</span></p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
								{{$product->links("pagination::bootstrap-4")}}
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">
							<div class="side">
								<h2>Danh mục</h2>
								<div class="fancy-collapse-panel">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										@foreach ($category as $categorys)
											
										
										<div class="panel panel-default">
											@if ($categorys->parent == 0)
												
											<div class="panel-heading" role="tab" id="headingOne">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#menu{{$categorys->id}}"
														aria-expanded="true" aria-controls="collapseOne"> {{$categorys->name}}
													</a>
												</h4>
											</div>
											@endif

											<div id="menu{{$categorys->id}}" class="panel-collapse collapse" role="tabpanel"
												aria-labelledby="headingOne">
												<div class="panel-body">
													<ul>
														@foreach ($category as $cat)
															@if ($categorys->id == $cat->parent)

															<li><a href="/getCat/{{$cat->slug}}">{{$cat->name}}</a></li>
																
															@endif
														
														@endforeach
													</ul>
												</div>
											</div>
										</div>
										@endforeach



									</div>
								</div>
							</div>
							<div class="side">
								<h2>Khoảng giá</h2>
								<form action="/filter" method="post" class="colorlib-form-2" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Từ:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="start" id="people" class="form-control">
														<option value="100000">100.000 VNĐ</option>
														<option value="200000">200.000 VNĐ</option>
														<option value="300000">300.000 VNĐ</option>
														<option value="400000">500.000 VNĐ</option>
														<option value="500000">1.000.000 VNĐ</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Đến:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="end" id="people" class="form-control">
														<option value="200000">2.000.00 VNĐ</option>
														<option value="400000">4.000.00 VNĐ</option>
														<option value="600000">6.000.00 VNĐ</option>
														<option value="800000">8.000.00 VNĐ</option>
														<option value="1000000">10.000.00 VNĐ</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<button type="submit" style="width: 100%;border: none;height: 40px;">Tìm
										kiếm</button>
								@csrf
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main -->
		@endsection
		
		
@section('js')
	

		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>

		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Flexslider -->
		<script src="js/jquery.flexslider-min.js"></script>

		<!-- Magnific Popup -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		

	
		<!-- Main -->
		<script src="js/main.js"></script>
		<script>
			$(document).ready(function () {

				var quantitiy = 0;
				$('.quantity-right-plus').click(function (e) {

					// Stop acting like a button
					e.preventDefault();
					// Get the field name
					var quantity = parseInt($('#quantity').val());

					// If is not undefined

					$('#quantity').val(quantity + 1);


					// Increment

				});

				$('.quantity-left-minus').click(function (e) {
					// Stop acting like a button
					e.preventDefault();
					// Get the field name
					var quantity = parseInt($('#quantity').val());

					if (quantity > 0) {
						$('#quantity').val(quantity - 1);
					}
				});

			});
		</script>

</body>

</html>
@endsection
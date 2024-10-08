<body>
	<!--header -->
	<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="/home"><img src="images/logo.png" alt="" style="width: 300px;height: 50px;"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="/home">Trang chủ</a></li>
								<li class="has-dropdown">
									<a href="/shop">Cửa hàng</a>
									<ul class="dropdown">
										<li><a href="cart.html">Giỏ hàng</a></li>
										<li><a href="checkout.html">Thanh toán</a></li>

									</ul>
								</li>
								<li><a href="/home/about">Giới thiệu</a></li>
								<li><a href="/home/contact">Liên hệ</a></li>
								<li><a href="cart.html"><i class="icon-shopping-cart"></i> Giỏ hàng [{{session("cartNotify")? session("cartNotify"): 0}}]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
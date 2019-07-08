	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Đăng nhập </h3>
						<p id="error" style="text-align: center;color: blue"></p>					
						<p>
							Đăng nhập để bắt đầu mua sản phẩm!!!
							Không có tài khoản?<br><a id="registerl" href="#" data-toggle="modal" data-target="#myModal2">Đăng ký<button type="hidden" class="close" data-dismiss="modal"></button>
							</a>

						</p>
						<!-- <form action="<?php echo BASE_URL ?>?p=customer&act=login" method="post"> -->
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Email" id="log_email" name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Mật khẩu" id="log_psw"  name="password" required="">
							</div>
							<input name="login" id="log_submit" type="submit" value="Đăng nhập">
							<!-- </form> -->
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
		<!-- //Modal1 -->
		<!-- //signin Model -->
		<!-- signup Model -->
		<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body modal-body-sub_agile">
						<div class="main-mailposi">
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
						</div>
						<div class="modal_body_left modal_body_left1">
							<h3 class="agileinfo_sign">Đăng ký</h3>
							<p>
								Hãy đăng ký tài khoản để bắt đầu mua sản phẩm của chúng tôi!!!
							</p>
							<form action="<?php echo BASE_URL ?>?p=customer&act=register" method="post">
								<div class="styled-input agile-styled-input-top">
									<input type="text" placeholder="Họ và tên" name="name" required="">
								</div>
								<div class="styled-input">
									<input type="email" placeholder="Email" name="email" required="">
								</div>
								<div class="styled-input">
									<input type="password" placeholder="Mật khẩu" name="password" id="password1" required="">
								</div>
								<div class="styled-input">
									<input type="password" placeholder="Nhập lại mật khẩu" name="confirm_psw" id="password2" required="">
								</div>
								<input type="submit" name="submit" value="Đăng ký">
							</form>
							<p>
								<a href="#">Tôi đồng ý với các điều khoản của cửa hàng!</a>
							</p>
						</div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
		<!-- //Modal2 -->
		<div id="myModal3" class="modal-map" tabindex="-1" role="dialog">
			<!-- Nội dung form đăng nhập -->
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="map_close" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div id="googleMap"  style="width:100%;height:600px;">

					</div>	
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>

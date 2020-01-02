<!-- Header -->
<div class="form-thong-tin">
	<div class="container">           
		<div class="row">
			<div class="col-md-8">
				<div class="thong-tin-chuyen-di">
					<p class="dia-diem"><i style="padding-right: 10px;" class="fa fa-bus	" aria-hidden="true"></i> <?php echo $tour['start_at'] ?> <i style="padding: 0 10px;" class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $tour['end_at'] ?> </p>
					<p class="thong-tin-nha-xe">
						<a href="#" data-toggle="modal" data-target="#exampleModalCenter">Thông tin nhà xe</a>
						<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalCenterTitle">Thông tin nhà xe <?php echo $tour['name'] ?>
										</h5>
									</div>
									<div class="modal-body">
										Nhà xe đi từ <?php echo $tour['start_at'] ?> đến <?php echo $tour['end_at'] ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</p>
				</div>
				<div class="clearfix"></div>
				<div class="thong-tin-da-chon"> 
					<div class="date">Khởi hành ngày: <?php echo date('d/m/Y', strtotime(explode(' - ', $tour['time'])[0])) ?></div>
					<div class="clearfix"></div>
					<div class="ten-nha-xe">
						<img src="./images/list-nhaxe/xe-anh-phung.jpg"> 
						<div class="chi-tiet-nha-xe">
							<h3>NHÀ XE <?php echo strtoupper($tour['name']) ?></h3>
							<p>
								<strong>Địa chỉ:</strong> <?php echo $tour['start_at'] ?><br/>
								<strong>Số điện thoại:</strong> 03 888 888
							</p>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="gio-xuat-phat">
						<?php
							$time = explode(' - ', $tour['time']);
						?>
						<div class="gio-di">
							<h4><?php echo explode(' ', $time[0])[1] ?></h4>
							<p><?php echo $tour['start_at'] ?></p>		
						</div>
						<div style="float: left;line-height: 50px;text-align: center;"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
						<div class="gio-den">
							<h4><?php echo explode(' ', explode(' - ', $tour['time'])[1])[1] ?></h4>
							<p><?php echo $tour['end_at'] ?></p>		
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<h4>THÔNG TIN ĐỂ LIÊN HỆ</h4>
				<div class="thong-tin-chuyen-di">
					<p class="dia-diem">Nhập Thông Tin Của Bạn</p>
					<p class="thong-tin-nha-xe">
						<a href="#">Nhập liệu <i class="fa fa-book" aria-hidden="true"></i></a>		
					</p>
				</div>
				<div class="well well-sm">
					<form id="customer-form" method="post">
						<input type="hidden" name="form-check" value="<?php echo $_SESSION['form-check'] ?>">
						<input type="hidden" name="tour_id" value="<?php echo $_GET['id'] ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Họ tên</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-user"></span>
									</span>
									<input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên" value="<?php echo $_POST['name'] ?? null ?>" required="required" /></div>
									<?php
										if(empty($_POST['name'])) {
											echo '<span class="text-error">Lỗi</span>';
										}
									?>
								</div>
								<div class="form-group">
									<label for="address">Địa chỉ</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i>
									</span>
									<input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" value="<?php echo $_POST['address'] ?? null ?>" required="required" /></div>
									<?php
										if(empty($_POST['address'])) {
											echo '<span class="text-error">Lỗi</span>';
										}
									?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
									</span>
									<input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email" value="<?php echo $_POST['email'] ?? null ?>" required="required" /></div>
									<?php
										if(empty($_POST['email'])) {
											echo '<span class="text-error">Lỗi</span>';
										}
									?>
								</div>
								<div class="form-group">
									<label for="subject">Số điện thoại</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-phone"></span>
									</span>
									<input type="phone" class="form-control" id="phone" name="phone" placeholder="Nhập Số điện thoại" value="<?php echo $_POST['phone'] ?? null ?>" required="required" /></div>
									<?php
										if(empty($_POST['phone'])) {
											echo '<span class="text-error">Lỗi</span>';
										}
									?>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="thong-tin-chuyen-di">
					<p class="dia-diem">Hoàn Tất Đặt Vé Xe</p>
					<p class="thong-tin-nha-xe">
						<a href="#">chi tiết <i class="fa fa-book" aria-hidden="true"></i></a>		
					</p>
				</div>
				<div class="clearfix"></div>
				<div class="hoan-tat-dat-ve">
					<!-- <p>Hành lý <span>0 đ</span></p> -->
					<p><b>Tổng tiền:</b> <span><?php echo number_format($tour['price']) ?> đ</span></p>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-warning pull-right" onclick="document.getElementById('customer-form').submit()">Đặt vé</button>
				</div>
			</div>
		</div>
	</div>
</div>
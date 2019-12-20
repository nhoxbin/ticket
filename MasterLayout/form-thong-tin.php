<!-- Header -->
<div class="form-thong-tin">
	<div class="container">           
		<div class="row">
			<div class="col-md-8">
				<div class="thong-tin-chuyen-di">
					<p class="dia-diem"><i style="padding-right: 10px;" class="fa fa-bus	" aria-hidden="true"></i> HÀ NỘI <i style="padding: 0 10px;" class="fa fa-angle-right" aria-hidden="true"></i> HỒ CHÍ MINH </p>
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
					<div class="date">Thứ sáu, 16 tháng 12 năm 2019</div>
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
						<div class="gio-di">
							<h4>18 : 30</h4>
							<p><?php echo $tour['start_at'] ?></p>		
						</div>
						<div style="float: left;line-height: 50px;text-align: center;"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
						<div class="gio-den">
							<h4>03 : 30</h4>
							<p><?php echo $tour['end_at'] ?></p>		
						</div>
						<div class="tong-gio">
							<h4>10h</h4>
							<p><i style="color: #1ba0e2" class="fa fa-clock-o" aria-hidden="true"></i> Tổng giờ đi</p>
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
					<form>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">
									Name</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
									</span>
									<input type="text" class="form-control" id="name" placeholder="Enter your name" required="required" /></div>
								</div>
								<div class="form-group">
									<label for="address">
									Address</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i>
									</span>
									<input type="text" class="form-control" id="address" placeholder="Enter your address" required="required" /></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">
									Email</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
									</span>
									<input type="email" class="form-control" id="email" placeholder="Enter your email" required="required" /></div>
								</div>
								<div class="form-group">
									<label for="subject">
									Mobile No.</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
									</span>
									<input type="phone" class="form-control" id="phone" placeholder="Enter your phone no." required="required" /></div>
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
					<button type="submit" class="btn btn-warning pull-right">Tiếp Tục</button>

				</div>
			</div>
		</div>
	</div>
</div>
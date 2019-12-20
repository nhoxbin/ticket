<!-- thong tin nha xe -->
<div class="list-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="information-left">
					<h3><i class="fa fa-bus" aria-hidden="true"></i> Tìm kiếm vé xe</h3>
					<p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('l d/m/Y', time()) ?> | <i class="fa fa-child" aria-hidden="true"></i> 1 người | phổ thông</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="information-right">
					<button type="button" class="btn btn-primary">Đối tìm kiếm</button>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row-md-12 bo-loc">
				Bộ Lọc:  		
				<div class="btn-group">
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Gía Vé <i class="fa fa-caret-down" style="color: 1ba0e2" aria-hidden="true"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Sắp xếp theo tăng dần</a>
						<a class="dropdown-item" href="#">Sắp xếp giảm dần</a>
					</div>	
				</div>
				<div class="btn-group">
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tên Nhà Xe <i class="fa fa-caret-down" style="color: 1ba0e2" aria-hidden="true"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Sắp xếp theo tăng dần</a>
						<a class="dropdown-item" href="#">Sắp xếp giảm dần</a>
					</div>	
				</div>
				<div class="btn-group">
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Điểm Đến <i class="fa fa-caret-down" style="color: 1ba0e2" aria-hidden="true"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Sắp xếp theo tăng dần</a>
						<a class="dropdown-item" href="#">Sắp xếp giảm dần</a>
					</div>	
				</div>
				<div class="btn-group">
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Điểm Đi <i class="fa fa-caret-down" style="color: 1ba0e2" aria-hidden="true"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Sắp xếp theo tăng dần</a>
						<a class="dropdown-item" href="#">Sắp xếp giảm dần</a>
					</div>	
				</div>
				<div class="btn-group">
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Thời gian đi <i class="fa fa-caret-down" style="color: 1ba0e2" aria-hidden="true"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Sắp xếp theo tăng dần</a>
						<a class="dropdown-item" href="#">Sắp xếp giảm dần</a>
					</div>	
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row-md-12 list-xe-khach">					
				<ul>
				<?php
					foreach ($tours as $tour) {
				?>
					<li>
						<div class="ten-nha-xe">
							<p><?php echo $tour['name'] ?></p>
						</div>
						<div class="mo-ta-xe">
							<p>							
								<i data-toggle="modal" data-target="#exampleModalCenter" class="fa fa-pencil-square-o" aria-hidden="true" title="Thông tin nhà xe"></i>
								<!-- Modal -->
								<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalCenterTitle">Thông tin nhà xe Anh phụng
												</h5>
											</div>
											<div class="modal-body">
												Nhà xe đi từ eah'leo đến thành phố hồ chí minh
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div> -->
							</p>
						</div>
						<div class="lich-trinh-di">
							<p><?php echo $tour['start_at'] ?><i class="fa fa-angle-right" style="color: orange; padding: 0 10px" aria-hidden="true"></i><?php echo $tour['end_at'] ?></p>
							<p><span style="color:#f0ad4e; padding-right: 10px; ">Giờ đi:</span><?php echo $tour['time'] ?></p> 
						</div>
						<div class="hanh-ly dropdown"><i class="fa fa-suitcase btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
							<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<button class="dropdown-item">Chỉ có hành lý</button>
								<button class="dropdown-item">Có thêm xe máy</button>
							</div>
						</div>
						<div class="bang-gia">
							<p class="money"> <?php echo number_format($tour['price']) ?> vnđ / khách</p>
							<a href="book.php?id=<?php echo $tour['id'] ?>" type="button" class="btn btn-warning">Đặt vé xe</a>
						</div>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- END  -->

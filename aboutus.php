<?php 
include 'header.php';
 ?>
<!--/banner-->
<div class="banner-bg banner-sec">	
	  <div class="container">
			 <div class="header">
			       <div class="logo">
						 <a href="index.php"><img src="images/logo.png" border="0" class="vertical" style="width: 100px;height: 100px;"></a>
				   </div>							 
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
					   		<li class="dropdown1"><a href="index.php">HOME</a>	
					   		</li>
						  <li class="dropdown1"><a href="aboutus.php">ABOUT US</a>
						  </li>
						  <li class="dropdown1"><a href="moto.php">MOTO</a>
							 <ul class="dropdown2">
								<li><a href="danhsach.php?category=1">DUCATI</a></li>
								<li><a href="danhsach.php?category=2">HONDA</a></li>
								<li><a href="danhsach.php?category=3">BMW</a></li>
							  </ul>
						 </li>      
						 <li class="dropdown1"><a href="news.php">NEWS</a>
						 </li>               
						 <li class="dropdown1"><a href="404.php">CONTACT</a>
						 </li>
						 <li class="dropdown1"><a href="login_form.php">ACCOUNT</a>
							 <ul class="dropdown2">
									<li>
									<?php
										if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
        									echo "<a href='dangky.php' style='padding-right:0.2px'>Đăng ký</a>";
    									}
    									else{
        									echo "<a>Welcome ".$_SESSION["name"]."</a>";
    									}
    								?>
									</li>
									<li>
									<?php
										if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
        									echo '<a href="login_form.php"> Đăng nhập</a>';
   					 					}
   										else{
        									echo '<a href="logout.php">Logout</a>';
   				 						}
   				 					?>
									</li>
									<li>
									<?php
										if( (!( isset( $_SESSION['admin']))) || ($_SESSION['admin'] != "okay")) {
        									echo '<a href="rootlogin_form.php">ADMIN</a>';
   					 					}
   										else{
        									echo '<a href="rootconfirm.php">ADMIN</a>';
   				 						}
								
									?>
									</li>
							  </ul>
						 </li>
						  <a class="shop" href="buy.php"><img src="images/cart.png" alt=""/></a>
					  </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div> 				 
</div>
<div class="container-fluid	intro">
	<div class="row2">
		<div class="col-md-8 col-md-offset-2">
			<div class="vip"></div>
			<div class="chain">THÔNG TIN CHUNG</div>
			<p class="text-intro">
			MOTO Store được thành lập bởi Đặng Phúc vào năm 2017 tại thành phố Hồ Chí Minh, Việt Nam, tuy mới thành lập không lâu nhưng MOTO Store đã trở thành công ty bán mô tô thành công nhất trên thế giới vượt xa các cửa hàng khác và trở thành top 1 doanh thu trong giới kinh doanh mô tô, trụ sở chính tọa lạc ở tòa nhà Bitexco, Quận 1, Tp Hồ Chí Minh</p>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<div class="vip1"></div>
			<div class="chain1">LĨNH VỰC</div>
			<p class="text-intro">
			MOTO Store cung cấp các loại xe mô tô với giá cả phải chăng, uy tín bậc nhất thế giới, đến với công ty chúng tôi các bạn sẽ được trải nghiệm cảm giác vô cùng mới lạ khi được tiếp xúc với các loại dịch vụ độc nhất vô nhị của chúng tôi</p>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<div class="vip2"></div>
			<div class="chain2">TẦM NHÌN</div>
			<p class="text-intro">			
			MOTO Store trong tương lai sẽ luôn giữ vững vị thế là nhà cung cấp mô tô số 1 thế giới và mong muốn được cung cấp mô tô tới tất cả các khách hàng trên thế giới với sản phẩm tốt nhất, uy tín nhất , dịch vụ tốt nhất</p>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<div class="vip3"></div>
			<div class="chain3">Đối tác</div>
			<p class="text-intro">			
			MOTO Store hiện là đối tác chính của các dòng xe moto trên thế giới từ Ducati, Honda, Bmw, ... trong tương lai MOTO Store sẽ là đối tác của mọi doanh nghiệp moto trên thế giới</p>
		</div>
	</div>
</div>
<?php 
include 'footer.php';
 ?>


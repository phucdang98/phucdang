 <!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include 'header.php';
 ?>
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
<!--/banner-->
<div class="container-fluid	intro">
<div class="row2">
<div class="col-md-8 col-md-offset-2">

<div class="chain4"> CÁCH THỨC THANH TOÁN</div>
<p class="text-intro" style="color:#DF01A5">Quý khách có thể đến showroom của chúng tôi tại địa chỉ : Số 2 Hải Triều, Bến Nghé, Quận 1, Hồ Chí Minh để mua hàng trực tiếp hoặc có thể thanh toán online bằng thẻ qua cửa hàng thanh toán trực tuyến của chúng tôi quý khách chỉ việc chọn mẫu mình xe mong muốn và thanh toán mọi chi phí đều đã được ghi rõ. XIN CHÂN THÀNH CẢM ƠN</p>

</div>

</div>
</div>
</div>

<!---->
<?php 
include 'footer.php';
 ?>


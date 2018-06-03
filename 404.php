<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include 'header.php';
 ?>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <style type="text/css">
 	.bando{
	letter-spacing: 1px;

    text-align: center;
    
    word-spacing: 2px;
    line-height: 1.8em;
    margin-top: 25px;
    padding-bottom: 50px;
 	}
 	.bando1{
 	padding-top: 25px;
 	font-size: 24px;
 	padding-left: 75px;
 	padding-right: 75px;
    color: #FE9A2E;
    font-weight: 600;

 	}
 </style>
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
<div class="bando">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5139304469035!2d106.70196091404752!3d10.771894362224637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4138cf4909%3A0xaa966d5f7d098671!2sT%C3%B2a+th%C3%A1p+Bitexco+Financial+Tower!5e0!3m2!1svi!2s!4v1515056238128" width="900" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
<p class="bando1">ĐỊA CHỈ: Số 2 Hải Triều, Bến Nghé, Quận 1, Hồ Chí Minh. Quý khách có thể tìm kiếm đường đi ở bàn đồ bên trên Hoặc có thể liên hệ với chúng tôi theo số <i class="fa fa-phone" aria-hidden="true">699669966969</i>  . XIN CHÂN THÀNH CẢM ƠN</p>

</div>

<div class="contact">
		<h3>CONTACT US</h3>
		<p>Please contact us for all inquiries and purchase options.</p>
		<form>
			 <input type="text" placeholder="NAME" required="">
			 <input type="text" placeholder="SURNAME" required="">			 
			 <input class="user" type="text" placeholder="USER@DOMAIN.COM" required=""><br>
			 <textarea placeholder="MESSAGE"></textarea>
			 <input type="submit" value="SEND">
		</form>

	</div>
</div>
</div>
</div>
<!---->
<?php 
include 'footer.php';
 ?>


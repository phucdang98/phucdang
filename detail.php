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
<div class="product">
	 <div class="container">
		 <div class="ctnt-bar cntnt">
			 <div class="content-bar">
				 <div class="single-page">
					 <div class="product-head">
						<a href="index.php">Home</a> <span>::</span>	
						</div>
					 <!--Include the Etalage files-->
						<link rel="stylesheet" href="css/etalage.css">
						<script src="js/jquery.etalage.min.js"></script>
				<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 400,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
						<!--//details-product-slider-->
				<?php
				        require 'database-config.php';
				        $id = $_GET['id'];
				        // echo "Connected successfully";
				        $sql = "SELECT categories.Name,products.id, product_name, product_code, description, category_id , image, prices,loai_id.name, speed from products, categories, loai_id WHERE products.category_id = categories.cateid and products.loaiid = loai_id.loaiid and products.id = $id";

				        $result = mysqli_query($conn, $sql);
				       
				        if (!$result) {

				        die("Can't query data. Error occure.".mysqli_error($conn));
				        }
				        if (mysqli_num_rows($result) > 0 ) {
				 if ($row = mysqli_fetch_assoc($result) ){

# code...

				echo "<div class='details-left-slider'>";
					echo "<div class='grid images_3_of_2'>";
						echo "<ul id='etalage'>";
							echo "<li>";
								echo "<a href='optionallink.html'>";            
									echo "<img class='etalage_thumb_image' src='".$row["image"]."' class='img-responsive'/>";
									echo "<img class='etalage_source_image' src='".$row["image"]."' class='img-responsive'/>";
								echo "</a>";
							echo "</li>";
						echo "</ul>";
					echo "</div>";
				echo "</div>";
				echo "<div class='details-left-info'>";
					echo "<h3>".$row["product_name"]."</h3>";
					echo "<p><label>$</label>".$row["prices"]."</p>";
					echo "<p class='size'>SPEED :: ".$row["speed"]." </p>";
					echo "<div class='btn_form'>";
						echo "<a href='cart.php?id=".$row["id"]."'>buy now</a>";
					echo "</div>";
					echo "<div class='bike-type'>";
						echo "<p>STYLE  :: ".$row["name"]."</p>";
						echo "<p>BRAND  :: ".$row["Name"]."</p>";
					echo "</div>";
					echo "<h5>Description  ::</h5>";
					echo "<p class='desc'>".$row["description"]."</p>";
				echo "</div>";
			echo "<div class='clearfix'></div>";
			}

			} else {
			echo "0 results";
			 }
			mysqli_close($conn);
			?>			 	
				  </div>
			  </div>
		  </div>
	 </div>
</div>
<!---->
<?php 
include 'footer.php';
 ?>


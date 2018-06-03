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
<div class="cart">
	 <div class="container">
		 <div class="cart-top">
			<a href="index.php"><< home</a>
		 </div>	
		<table>
		<tr>
		<td>
			<tr>
		 <div class="col-md-9 cart-items">
			 <h2>My Shopping Bag</h2>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			   
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

				echo "<div class='cart-header'>";
					echo " <div class='close1'> </div>";
						echo "<div class='cart-sec'>";
							echo "<div class='cart-item cyc'>";
								echo " <img src='".$row["image"]."'>";            
							echo "</div>";
							echo " <div class='cart-item-info'>";
								echo "<h3>".$row["product_name"]."</h3>";
								echo "<h4><span>Rs. $ </span>".$row["prices"]."</h4>";
								echo "<p class='qty'>Qty ::</p>";
								echo "<input min='1' type='number'id='quantity' name='quantity' value='1' class='form-control input-small'>";
							echo "</div>";
							echo "<div class='clearfix'></div>";
							echo "<div class='delivery'>";
								echo "<p>Service Charges:: Rs.100.000</p>";
								echo "<span>Delivered in 2-3 bussiness days</span>";
								echo "<div class='clearfix'></div>";
							echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";			
			}

			} else {
			echo "0 results";
			 }
			mysqli_close($conn);
			?>	
		 </div>
		 </tr>
		 <tr>
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
				 if ($row = mysqli_fetch_assoc($result)){


# code...

				echo "<div class='col-md-3 cart-total'>";
					echo " <a class='continue' href='moto.php'>Continue to basket</a>";
						echo "<div class='price-details'>";
							echo "<h3>Price Details</h3>";
								echo " <span>Total</span>";            
								echo "<span class='total'>".$row["prices"]."</span>";
								echo "<span>Discount</span>";
								echo "<span class='total'>---</span>";
								echo "<span>Delivery Charges</span>";
								echo "<span class='total'>150.000</span>";
								echo "<div class='clearfix'></div>";
							echo "</div>";
							echo "<h4 class='last-price'>TOTAL</h4>";
							echo "<span class='total final'>".$row["prices"]." + '150.000 vnđ'</span>";
							echo "<div class='clearfix'></div>";
							echo "<a class='order' href='#''>Place Order</a>";
							echo "<div class='total-item'>";
								echo "<h3>OPTIONS</h3>";
								echo "<h4>COUPONS</h4>";
								echo "<a class='cpns' href='#''>Apply Coupons</a>";
								echo "<p><a href='login_form.php' style='color: blue;'>Log In</a> to use accounts - linked coupons</p>";
							echo "</div>";
						echo "</div>";		
			}

			} else {
			echo "0 results";
			 }
			mysqli_close($conn);
			?>
				
			</tr>
			</td>
		</table>	
	 </div>
</div>


<!---->
<?php 
include 'footer.php';
 ?>


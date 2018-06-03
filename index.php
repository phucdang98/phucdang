<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
	include 'header.php';
 ?>	 
<!-- 	 <div class="caption">
		 <div class="slider">
					   <div class="callbacks_container">
						   <ul class="rslides" id="slider">
							    <li><h1>HANDMADE BICYCLE</h1></li>
								<li><h1>SPEED BICYCLE</h1></li>	
								<li><h1>MOUINTAIN BICYCLE</h1></li>	
						  </ul>
						  <p>You <span>create</span> the <span>journey,</span> we supply the <span>parts</span></p>
						  <a class="morebtn" href="aboutus.php">SHOP BIKES</a>
					  </div>
				  </div>
	 </div>
	 <div class="dwn">
		<a class="scroll" href="#cate"><img src="images/scroll.png" alt=""/></a>
	 </div>				 
</div> -->
<!--/banner-->
<div class="banner-bg banner-bg1">	
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
<div id="cate" class="categories">
	 <div class="container">
		 <h4>CATEGORIES</h4>
		 <div class="categorie-grids">
			 <a href="aboutus.php"><div class="col-md-4 cate-grid grid1">
				 <h4>DUCATI</h4>
				 <a class="store" href="danhsach.php?category=1">GO TO STORE</a>
			 </div></a>
			 <a href="aboutus.php"><div class="col-md-4 cate-grid grid2">
				 <h4>BMW</h4>
				 <a class="store" href="danhsach.php?category=3">GO TO STORE</a>
			 </div></a>
			 <a href="aboutus.php"><div class="col-md-4 cate-grid grid3">
				 <h4>HONDA</h4>
				 <a class="store" href="danhsach.php?category=2">GO TO STORE</a>
			 </div></a>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!--bikes-->

<div class="bikes">	
		 <h3>POPULAR MOTO</h3>
		 <div class="bikes-grids" >	
		 <ul id='flexiselDemo1'>"		 
			 		<?php
					    require 'database-config.php';
					    // echo "Connected successfully";
					    $sql = "SELECT * FROM products where soluongban > '30'";
					    $result = mysqli_query($conn, $sql);
					    if (!$result) {
					    die("Can't query data. Error occure.".mysqli_error($conn));
					    }
					    if (mysqli_num_rows($result) > 0) {

					      while($row = mysqli_fetch_assoc($result)) {
					      	
					      	echo "<a href='detail.php?id=".$row["id"]."'><li>";
					        echo " <img src='".$row["image"]."' style='width: 400px; height: 250px; ''>";
					       		echo "<div class='bike-info'>";
					       			echo "<div class='model'>";
					        		echo "<a href='detail.php?id=".$row["id"]."'><h4 style='font-size:1.1em; font-weight:600;' >".$row["product_name"]."<span style='color: red; font-weight:600; display:block; margin-top:5px; font-size:1.1em; font-weight:600;'>".$row["prices"]."</span></h4></a>";
					        		echo "</div>";
					        		echo "<div class='model-info'>";
					        		echo "<a href='cart.php?id=".$row["id"]."' >BUY</a>";
					        		echo "</div>";
					        		echo "<div class='clearfix'></div>";
					        		echo "</div>";
					        		echo "<div class='viw'><a href='detail.php?id=".$row["id"]."'>Quick view</a></div>";
					        echo "</li></a>";
					      }         
					    } else {
					    echo "0 results";
					    }
					    mysqli_close($conn);
					 	 
					   
					   //   echo "</div>";
					     // echo "</div>";
					?>

 </ul>
		   

					 
	</div>
</div>
<!---->


<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
<?php 
	include 'footer.php';
 ?>	 
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
<div class="parts">
	 <div class="container">
		 <!-- <h2>BIKE-PARTS ALL</h2> -->
		 <div class="bike-parts-sec">
		      <div class="bike-parts">
				 <div class="top">
					 <ul>
						 <li><a href="index.php">home</a></li>
						 <li><a href="#">/Moto</a></li>
						 <li>
							<form class="searchform" action="search.php" method="get">
							<input type="text" name="search"/>
							<input type="submit" name="ok" value="search" />
							</form>	
						 </li>
					 </ul>				 	
				 </div>
				 <div class="bike-apparels">
					 <div class="parts1">
					 	<?php
					    require 'database-config.php';

					    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
						$result = mysqli_query($conn, 'select count(id) as total from products');
						$row = mysqli_fetch_assoc($result);
						$total_records = $row['total'];
						 
						// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
						$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
						$limit = 12;
						 
						// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
						// tổng số trang
						$total_page = ceil($total_records / $limit);
						 
						// Giới hạn current_page trong khoảng 1 đến total_page
						if ($current_page > $total_page){
						    $current_page = $total_page;
						}
						else if ($current_page < 1){
						    $current_page = 1;
						}
						 
						// Tìm Start
						$start = ($current_page - 1) * $limit;
						 
						// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
						// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
						$result = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit");

					    if (!$result) {
					    die("Can't query data. Error occure.".mysqli_error($conn));
					    }
					    if (mysqli_num_rows($result) > 0) {

					      while($row = mysqli_fetch_assoc($result)) {
					      	// echo "<div class='bikes'";
					      	
					      	echo "<a href='detail.php?id=".$row["id"]."'><div class='part-sec'>";
					      	
					        echo " <img src='".$row["image"]."'>";
					       		echo "<div class='part-info'>";
					        		echo "<a href='detail.php?id=".$row["id"]."'><h5>".$row["product_name"]."<span>".$row["prices"]."</span></h5></a>";
					        		echo "<a class='add-cart' href='detail.php?id=".$row["id"]."'>Quick View</a>";
					        		echo "<a class='qck' href='cart.php?id=".$row["id"]."'>BUY NOW</a>";
					        		echo "</div>";
					       		
					       echo "</div></a>";
					       
					      }
					      echo "<div class='postnav'>";
					      echo "<ul>";
					      	// BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
							// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
							if ($current_page > 1 && $total_page > 1){
							    echo '<li><a href="moto.php?page='.($current_page-1).'">Prev</a></li> | ';
							}
							 
							// Lặp khoảng giữa
							for ($i = 1; $i <= $total_page; $i++){
							    // Nếu là trang hiện tại thì hiển thị thẻ span
							    // ngược lại hiển thị thẻ a
							    if ($i == $current_page){
							        echo '<li><a><span>'.$i.'</span></a></li> | ';
							    }
							    else{
							        echo '<li><a href="moto.php?page='.$i.'">'.$i.'</a></li> | ';
							    }
							}
							 
							// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
							if ($current_page < $total_page && $total_page > 1){
							    echo '<li><a href="moto.php?page='.($current_page+1).'">Next</a></li> | ';
							}
						echo "</ul>";
						echo "<div class='break'></div>";
						echo "</div>";

					    } else {
					    echo "0 results";
					    }

					    mysqli_close($conn);
					 	 

					   
					?>


						 
						 
						 <div class="clearfix"></div>
					 </div>
					
 
				 </div>
			 </div>
			 <div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right">
						 	<h3 class="m_2"><a href="danhsach.php?category=1">Ducati</a></h3>
							<select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}' onchange="location = this.options[this.selectedIndex].value;">
								<option value="danhsach.php?category=1">Phân Khối</option>
								<option value="loaisanpham.php?category=1&loai=1">300CC</option>	
								<option value="loaisanpham.php?category=1&loai=2">500CC</option>
								<option value="loaisanpham.php?category=1&loai=3">1000CC</option>
															
						   </select>
						   <h3 class="m_2"><a href="danhsach.php?category=2">HONDA</a></h3>
						   <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}' onchange="location = this.options[this.selectedIndex].value;">
						   		<option value="danhsach.php?category=2">Phân Khối</option>
								<option value="loaisanpham.php?category=2&loai=1">300CC</option>	
								<option value="loaisanpham.php?category=2&loai=2">500CC</option>
								<option value="loaisanpham.php?category=2&loai=3">1000CC</option>
															
						   </select>
						   <h3 class="m_2"><a href="danhsach.php?category=3">BMW</a></h3>
						   <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}' onchange="location = this.options[this.selectedIndex].value;">
						   		<option value="danhsach.php?category=3">Phân Khối</option>
								<option value="loaisanpham.php?category=3&loai=1">300CC</option>	
								<option value="loaisanpham.php?category=3&loai=2">500CC</option>
								<option value="loaisanpham.php?category=3&loai=3">1000CC</option>
															
						   </select>
					  </div>
			 
					 
			 </div>			 
			 <div class="clearfix"></div>
		 </div>
	  </div>
</div>
<!---->
<?php 
include 'footer.php';
 ?>


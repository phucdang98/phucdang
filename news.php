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
   
.giamgia {
  position: relative;
  z-index: 1;
  background: #F2F5A9;
  font-weight: 600;
  font-size: 20px;
  color:red;
  max-width: 360px;
  margin: 25px 25px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 10px;
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
<!-- BEGIN wrapper -->

<div id="wrapper">
  <!-- BEGIN header -->
  <!-- END header -->
  <!-- BEGIN content -->
  <table>
  <td>
  <tr>
  <div id="content">
    <!-- begin post -->
      <?php

              require 'database-config1.php';

              // BƯỚC 2: TÌM TỔNG SỐ RECORDS
              $result = mysqli_query($conn, 'select count(id) as total from new');
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
              $result = mysqli_query($conn, "SELECT * FROM new LIMIT $start, $limit");
                if (!$result) {
                die("Can't query data. Error occure.".mysqli_error($conn));
                }
              if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
                  
                  echo "<div class='post'>";                
                    echo "  <div class='thumb'><a href='".$row["link"]."'><img src='".$row["image"]."' style='width:247px; height:120px;'/></a></div>";
                    echo "<h2 style='height:70px;'><a href='".$row["link"]."'>".$row["name"]."</a></h2>";
                    echo "<p class='date'>Posted on ".$row["date"]." by admin</p>";
                    echo "<p style='height:150px;'>".$row["noidung"]."</p>";
                    echo " <a class='continue' href='".$row["link"]."'>Continue Reading</a></div>";
                }
                echo "<div class='postnav'>";
                echo "<ul>";
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
       
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($current_page > 1 && $total_page > 1){
                        echo '<li><a href="news.php?page='.($current_page-1).'">Prev</a></li> | ';
                    }
                     
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page){
                            echo '<li><a><span>'.$i.'</span></a></li> | ';
                        }
                        else{
                            echo '<li><a href="news.php?page='.$i.'">'.$i.'</a></li> | ';
                        }
                    }
                     
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<li><a href="news.php?page='.($current_page+1).'">Next</a></li> | ';
                    }
                echo "</ul>";
                echo "<div class='break'></div>";
                echo "</div>";         
              } else {
              echo "0 results";
              }
              mysqli_close($conn);
          ?>

    <!-- end post -->
    <!-- begin post -->

  </div>
  </tr>
  <!-- END content -->
  <!-- BEGIN sidebar -->
  <tr>
  <div id="sidebar">
   
    <!-- begin search -->
    <form class="search" action="search1.php" method="get">
      <input type="text" name="search1"/>
      <input type="submit" name="ok" value="search" />
    </form>
    <!-- end search -->
    <div class="wrapper">
      <!-- begin popular posts -->
      <h2>Popular Posts</h2>
      <ul>

        <?php
              require 'database-config1.php';
              // echo "Connected successfully";
              $sql = "SELECT * FROM new where soluongxem > 50";
              $result = mysqli_query($conn, $sql);
              if (!$result) {
              die("Can't query data. Error occure.".mysqli_error($conn));
              }
              if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
                  
                  
                  echo "<li><a href='".$row["link"]."'>".$row["name"]."</a></li>";
                  
                }         
              } else {
              echo "0 results";
              }
              mysqli_close($conn);

          ?>
      </ul>
      <!-- end popular posts -->
      <!-- begin flickr photos -->
      <h2>HOT PHOTOS</h2>
      <div class="flickr">
      <?php
              require 'database-config1.php';
              // echo "Connected successfully";
              $sql = "SELECT * FROM new where soluongxem > 100";
              $result = mysqli_query($conn, $sql);
              if (!$result) {
              die("Can't query data. Error occure.".mysqli_error($conn));
              }
              if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
                  
                  
                  echo "<a href='".$row["link"]."'><img src='".$row["image"]."' style='width:80px; height:80px;'/></a>";
                  
                }         
              } else {
              echo "0 results";
              }
              mysqli_close($conn);

          ?> 
      </div>
      <!-- end flickr photos -->
      <!-- begin tags -->
      <h2>Coming Soon</h2>
      <div class="flickr">
      <ul> 
      <li><a href="https://baomoi.com/xem-truoc-loat-mo-to-pkl-cua-honda-ra-mat-trong-nam-2018/c/23876618.epi"><img src="images/cm.jpg " style='width:320px; height:320px;'>
      Honda CBR250RR</a></li>
      <li><a href="https://baomoi.com/xem-truoc-loat-mo-to-pkl-cua-honda-ra-mat-trong-nam-2018/c/23876618.epi"><img src="images/cm1.jpg " style='width:320px; height:320px;'>
      Honda CBR500RR</a></li>



      </div>
      <div class="flickr"> 
        <div class="giamgia">
          <p>GIẢM GIÁ 50% NẾU BẠN ĐÃ THEO DÕI PHÚC ĐẶNG TRÊN FACEBOOK</p>
          <a href="https://www.facebook.com/nhox.chimin"><i class="fa fa-facebook-official" aria-hidden="true">CLICK HERE</i></a>
         </div> 
      </div>
      <!-- end tags -->
      <!-- BEGIN left -->
      <div class="l sbar">
        <!-- begin archives -->
         <h2>Meta</h2>
        <ul>
          <li><a href="login_form.php">Login</a></li>
        </ul>
        <!-- end archives -->
      </div>
      <!-- END left -->
    </div>
  </div>
  </tr>
  </td>
  </table>
  <!-- END sidebar -->
  <!-- BEGIN footer -->
  <div id="footer">
  </div>
  <!-- END footer -->
</div>
<!---->
<?php 
include 'footer.php';
 ?>

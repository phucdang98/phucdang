<?php 
include 'header.php';
 ?>

<div class="banner-bg banner-sec">  
      <div class="container">
             <div class="header">
                   <div class="logo">
                         <a href="index.php"><img src="https://s3.amazonaws.com/lg-vectors/bitmaps/461625/526164.png?logo_version=0" border="0" class="vertical" style="width: 100px;height: 100px;"></a>
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
                    include "database-config.php";
                     if (isset($_REQUEST['ok'])) 
                    {
                    // Gán hàm addslashes để chống sql injection
                    $search = addslashes($_GET['search']);
         
                    // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                    if (empty($search)) {
                        echo "Yeu cau nhap du lieu vao o trong";
                    } 
                    else
                    {
                        // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                        $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
         
                        // Đếm số đong trả về trong sql.
                        $result = mysqli_query($conn, $sql);
         
                        // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                        if (mysqli_num_rows($result) > 0 && $search != "") 
                        {
         
                            // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array. 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='detail.php?id=".$row["id"]."'><div class='part-sec'>";
                            
                                echo " <img src='".$row["image"]."'>";
                                echo "<div class='part-info'>";
                                    echo "<a href='detail.php?id=".$row["id"]."'><h5>".$row["product_name"]."<span>".$row["prices"]."</span></h5></a>";
                                    echo "<a class='add-cart' href='detail.php?id=".$row["id"]."'>Quick View</a>";
                                    echo "<a class='qck' href='cart.php?id=".$row["id"]."'>BUY NOW</a>";
                                    echo "</div>";
                                
                                echo "</div></a>";
                                    }

                                } 
                                else {
                                    echo "Khong tim thay ket qua!";
                                }
                            }
                        }

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
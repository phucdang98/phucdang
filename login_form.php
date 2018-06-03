<?php   session_start();  ?>
<?php
// insert code PHP here
  
  
    // if( (isset( $_SESSION['login_status'])) && ($_SESSION['login_status'] == "ready" && $_user == $user)) {
    //     header("Location: Home.php");
    // }
    if( (isset( $_SESSION['login_status'])) && ($_SESSION['login_status'] == "ready")) {
        header("Location: index.php");
    }
    



$sErr= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset( $_POST["login"]) ) {
    $_user = $_POST['nA'];
    $_pass = $_POST['nB'];
    // kiểm tra user
require 'database-config.php';
$sql = "SELECT id,username,pass from user";
$result = mysqli_query($conn, $sql);
if(!$result){
  die( "Can't query data".mysqli_error($conn) );
}

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
      $id= $row["id"];
      $user = $row["username"];
      $pass = $row["pass"];

      if( $_user == $user && $_pass == $pass ){
        $_SESSION["id"]= $id;
        $_SESSION["login_status"]= "ready";
        $_SESSION["name"]= $user;
        echo "<script>location='index.php'</script>";
    }
    
      }
} 


//end kiem tra
    
   $sql1 = "SELECT name,pass from admin";
$result1 = mysqli_query($conn, $sql1);
if(!$result1){
  die( "Can't query data".mysqli_error($conn) );
}

if (mysqli_num_rows($result1) > 0) {

    while($row = mysqli_fetch_assoc($result1)) {
      $adminname = $row["name"];
      $adminpass = $row["pass"];
    if( $_user == $adminname && $_pass == $adminpass ){
      $_SESSION["admin"] = "okay";
      $_SESSION["login_status"]= "ready";
        $_SESSION["name"]= $_user;
        header("Location:rootconfirm.php");

    }
    else{
        $sErr= "Username hoặc Password bị sai hoặc chưa tồn tại.";
    }
   }
 }
   mysqli_close($conn);
  }
} // end if isset
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
	<title>MOTO STORE</title>
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #F8f8f8;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 10px;
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
.thumbnail{
  -moz-border-radius: 5px;
border-radius: 10px;
background-color:   #f8f8f8;
width: 150px;
margin-left: 50px;
padding-left: 15px;
}
.thumbnail:hover{
  -moz-box-shadow: 0 0 10px #ccc;
    -webkit-box-shadow: 0 0 10px #ccc;
    box-shadow: 0 0 10px #ccc;
      filter: brightness(130%);
  cursor: pointer;
  transform: translate(2px,4px);
} 
body {
  background: url(images/2017120909383833.jpg) no-repeat top center;
  background-size: cover;

  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

	</style>
</head>
<body>

<?php
    if( $sErr != ""){
      echo '<script language="javascript">';
      echo 'alert("'.$sErr.'")';
      echo '</script>';
    }   
?>  

<a href="index.php"><img src="images/logo.png" border="0" class="vertical" style="width: 100px; height: 100px;"></a>

<div class="login-page">
  <div class="form">
  <h2 style="vertical-align: center">Đăng nhập</h2>
    <form action="login_form.php" method="post">
      <input type="text" placeholder="username" name="nA"/>
      <input type="password" placeholder="password" name="nB"/>
      <button type="submit" value="login" name="login">Đăng nhập</button>
      <p class="message">Not registered? <a href="dangky.php">Create an account</a></p>
    </form>
  </div>
</div>
<script type="text/javascript">
	$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</body>
</html>
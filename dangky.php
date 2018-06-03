<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Đăng Ký</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- DataTable CSS -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.0/datatables.min.css"/>
		<style type="text/css">
			body {
	background: #BE93C5;  /* fallback for old browsers */
	background: -webkit-linear-gradient(left, #7BC6CC, #BE93C5);
	background: -o-linear-gradient(left, #7BC6CC, #BE93C5);
	background: linear-gradient(to right, #7BC6CC, #BE93C5);  /* Chrome 10-25, Safari 5.1-6 */

	/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.signup-container {
	width: 300px;
	min-height: 300px;
	background-color: rgba(247, 247, 247, .5);
	max-width: 350px;
	padding: 40px 40px;
	margin: 50px auto;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.5), 0 0 8px rgba(0, 0, 0, 0.2);
	border-radius: 10px;
}


.btn-signup {
	width: 100%;
}
body{
	background: url(images/18.png) no-repeat top center;
  background-size: cover;
}
		</style>
	</head>
	<body>
<a href="index.php"><img src="images/logo.png" border="0" class="vertical" style="width: 100px; height: 100px;"></a>
		<div class="container">
			<div class="signup-container">
				<h3 style="text-align: center;padding-bottom: 10px;">ĐĂNG KÝ</h3>
				
				<form class="form" id="signup" data-toggle="validator" action="dangky.php" method="post">
				<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span>First name</span>
							</span>
							<input type="text" class="form-control"  placeholder="First name" name="fname" required>
							<!-- <div class="input-group-btn">
								<button class="btn btn-success">OK</button>data-match="
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span>Last name</span>
							</span>
							<input type="text" class="form-control"  placeholder="Last name" name="lname" required>
							<!-- <div class="input-group-btn">
								<button class="btn btn-success">OK</button>data-match="
							</div> -->
						</div>
					</div>
					<div class="form-group" id="email-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</span>
							<input type="text" class="form-control"  placeholder="Username" name="username" id="username" autocomplete="off" required > 
							<span class="glyphicon glyphicon-remove form-control-feedback hidden" id="email-error"></span>
						</div>
						<!-- <span class="help-block">This is some help text...</span> -->
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</span>
							<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pass" required >
						</div>
					</div>
						<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
							</span>
							<input type="text" class="form-control"  placeholder="sodienthoai" name="phone" required >
						</div>
					</div>
					
					<input class="btn btn-large btn-success" type="submit" value="Đăng ký" name="register" />
					
				</form>
				<a href="login_form.php">Đăng nhập</a>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- DataTable -->
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.0/datatables.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
		<!-- Mine JS -->

		<!-- xử lý đăng ký -->
<?php
require"database-config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset( $_POST["register"]) ) {
    $_username = $_POST['username'];
    $_password = $_POST['pass'];
    $_fname = $_POST['fname'];
    $_lname = $_POST['lname'];
    $_phone = $_POST['phone'];
     if ($_username == "" || $_password == "" || $_fname == "" || $_lname == "" || $_phone == "") {
				   echo '<script language="javascript">';
      					echo 'alert("vui lòng điền đầy đủ thông tin")';
      					echo '</script>';
	}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from user where username='$_username'";
					$kt=mysqli_query($conn, $sql);
 
					if(mysqli_num_rows($kt)  > 0){
						echo '<script language="javascript">';
      					echo 'alert("tài khoản đã tồn tại")';
      					echo '</script>';
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO user(username, pass,fname,lname,phone) VALUES('".$_username."','". $_password."','".$_fname."','".$_lname."','".$_phone."')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo '<script language="javascript">';
      					echo 'alert("Đăng ký thành công")';
      					echo '</script>';
					}
									    
					
			  }
	
    }
}
?>


	</body>
</html>
		

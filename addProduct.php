<?php  
header("Content-Type: application/json");
require 'database-config.php';

	if(isset($_POST["product_name"]) && isset($_POST["category"])&& isset($_POST["description"]) && isset($_POST["loai"]) ){
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// Move upload file to img
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		$name= $_POST["product_name"];
		$soluongban = $_POST["soluongban"];
		$speed = $_POST["speed"];
		$category= $_POST["category"];
		$loai= $_POST["loai"];
		$description= $_POST["description"];
		$price= $_POST["prices"];
		$sql= "INSERT INTO products(product_name,soluongban,speed,category_id,loaiid,description,prices,image) VALUES
		('".$name."','".$soluongban."','".$speed."','".$category."','".$loai."','".$description."','".$price."','".$target_file."')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$data["result"]=true;
			$data["message"]="Add product successfully";
			//header("Location: index.php");
			// die();

		}else{
			$data["result"]=false;
			$data["message"]= "Can not add product.Error".mysqli_error($conn);
		}
	}else{
		$data["result"]=false;
		$data["message"]= "Invalid product information";
	}
	echo json_encode($data);

?>
<?php  
header("Content-Type: application/json");
require 'database-config1.php';

	if(isset($_POST["product_name"])  && isset($_POST["date"]) && isset($_POST["description"]) ){
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// Move upload file to img
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		$name= $_POST["product_name"];
		$date= $_POST["date"];
		$description= $_POST["description"];
		$chitiet = $_POST["chitiet"];
		$soluong = $_POST["soluong"];
		$sql= "INSERT INTO new(name,date,noidung,link,soluongxem,image) VALUES
		('".$name."','".$date."','".$description."','".$chitiet."','".$soluong."','".$target_file."')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$data["result"]=true;
			$data["message"]="Add news successfully";
			//header("Location: index.php");
			// die();

		}else{
			$data["result"]=false;
			$data["message"]= "Can not add news.Error".mysqli_error($conn);
		}
	}else{
		$data["result"]=false;
		$data["message"]= "Invalid news information";
	}
	echo json_encode($data);

?>
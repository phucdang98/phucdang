<?php
header("Content-Type:application/json");
require "database-config.php";

if (isset($_POST["id"]) && isset($_POST["product_name"]) && isset($_POST["soluongban"]) && isset($_POST["speed"]) && isset($_POST["category"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["loai"]) ) {

    $id = $_POST["id"];
    $name = $_POST["product_name"];
    $soluongban = $_POST["soluongban"];
    $speed = $_POST["speed"]; 
    $category= $_POST["category"];
    $loai= $_POST["loai"];
    $price= $_POST["price"];
    $description= $_POST["description"];

    $target_dir = "images/";
    $target_file = $target_dir.date('YmdHis').basename($_FILES["fileToUpload"]["name"]);
    // Move upload file to img
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    $sql = "UPDATE products SET product_name='".$name."',soluongban='".$soluongban."',speed='".$speed."',category_id='".$category."',loaiid='".$loai."',description='".$description."',prices='".$price."',image='".$target_file."' WHERE id=".$id;

    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data["result"] = true;
        $data["message"]  ="Edit product successfully";
        $data["sql"] = $sql;
    }else{
        $data["result"] = false;
        $data["message"]  ="Cannot edit product. Error: ".mysqli_error($conn);
    }
}else{
    $data["result"] = false;
    $data["message"]  ="Invalid";
}

echo json_encode($data)
?>
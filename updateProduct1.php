<?php
header("Content-Type:application/json");
require "database-config1.php";
if (isset($_POST["product_name"]) && isset($_POST["date"])) {
    $id = $_POST["id"];
    $name = $_POST["product_name"];
    $date = $_POST["date"];
    $description= $_POST["description"];
    $chitiet = $_POST["chitiet"];
    $soluong = $_POST["soluong"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // Move upload file to img
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $sql = "UPDATE new SET name='".$name."', date ='".$date."', noidung ='".$description."',link='".$chitiet."',soluongxem='".$soluong."',image ='".$target_file."' WHERE id = ".$id;
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data["result"] = true;
        $data["message"]  ="Add product successfully";
        // echo header("location: index.php");
    }else{
        $data["result"] = false;
        $data["message"]  ="Cannot add product. Error: ".mysqli_error($conn);
    }
}else{
    $data["result"] = false;
    $data["message"]  ="Invalid";
}
echo json_encode($data)
?>
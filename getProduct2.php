<?php
require"database-config.php";
$sql = "SELECT * from user";
$result = mysqli_query($conn, $sql);
if(!$result){
	$data["message"] = "Can't query data".mysqli_error($conn);
	$data["result"] = false;
} else {
	if (mysqli_num_rows($result) > 0) {
	    while($rows = mysqli_fetch_assoc($result)) {
	       $json[] = $rows;
	    }
	    $data["product"] = $json;
	    $data["result"] = true;  
	} else {
		$data["message"] = "0 product";
		$data["result"] = false;
	}
}
$data["product"] = $json;

mysqli_close($conn);
echo json_encode($data);
?>
<?php 
	header("Content-Type:appliacation/json");
	require"database-config.php";
$sql = "SELECT * FROM loai_id";
$result = mysqli_query($conn, $sql);
if(!$result){
	$data["message"] = "Can't query data".mysqli_error($conn);
	$data["result"] = false;
} else {
	if (mysqli_num_rows($result) > 0) {
	    while($rows = mysqli_fetch_assoc($result)) {
	       $json3[] = $rows;
	    }
	    $data["loai_id"] = $json3;
	    $data["result"] = true;  
	} else {
		$data["message"] = "0 product";
		$data["result"] = false;
	}
}
$data["loai_id"] = $json3;

mysqli_close($conn);
echo json_encode($data);
?>
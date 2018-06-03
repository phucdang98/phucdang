<?php
require"database-config1.php";
$sql = "SELECT * from new";
$result = mysqli_query($conn, $sql);
if(!$result){
	$data["message"] = "Can't query data".mysqli_error($conn);
	$data["result"] = false;
} else {
	if (mysqli_num_rows($result) > 0) {
	    while($rows = mysqli_fetch_assoc($result)) {
	       $json[] = $rows;
	    }
	    $data["new"] = $json;
	    $data["result"] = true;  
	} else {
		$data["message"] = "0 news";
		$data["result"] = false;
	}
}
$data["new"] = $json;

mysqli_close($conn);
echo json_encode($data);
?>
<?php 
date_default_timezone_set("Asia/Makassar");
$now = date("Y-m-d H:i:s");

// //TELEGRAM
$token = '1322089322:AAGK9ZND6n3MUsw8GpnRYJhCs1UFjNUIoG0';
$user_id = '-477947928';

function tele($data){
	file_get_contents($data);
}

function pingAddress($ip) {
	$pingresult = exec("ping -n 2 $ip", $outcome, $status);
	if (0 == $status) {
		return true;
	} else {
		return false;
	}
}

// DATABASE
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ci4app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM address";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$website = $row['address'];
	$querylog = "SELECT status FROM log_status where address ='". $row['address'] ."' order by created_at desc limit 1";
	$queryresult = $conn->query($querylog);
	$row1 = $queryresult->fetch_assoc();
	if($queryresult->num_rows == 0){
		$conn->query("INSERT INTO log_status (device_name,address,location,status,created_at) values ('".$row['device_name']."','".$row['address']."','".$row['location']."','".$row['status']."','".$now."')");
	}
	if (!pingAddress($website)){
		$status = "Disconnect";
		if ($row1['status'] == 'Connect'){
			echo $website .' '.$status."\r";
			$conn->query("INSERT INTO log_status (device_name,address,location,status,created_at) values ('".$row['device_name']."','".$row['address']."','".$row['location']."','".$status."','".$now."')");
			$conn->query("UPDATE address set status='".$status."' where address='".$row['address']."' ");

			$message = $website .' '.$status;
			$data = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=$user_id&text=$message";
			tele($data);
		} else {
			echo $website .' '.$status."\r";
		}
	} else {
		$status = "Connect";
		if ($row1['status'] == 'Disconnect'){
			echo $website .' '.$status."\r";
			$conn->query("INSERT INTO log_status (device_name,address,location,status,created_at) values ('".$row['device_name']."','".$row['address']."','".$row['location']."','".$status."','".$now."')");
			$conn->query("UPDATE address set status='".$status."' where address='".$row['address']."' ");

			$message = $website .' '.$status;
			$data = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=$user_id&text=$message";
			tele($data);
		} else {
			echo $website .' '.$status."\r";
		}
	}
}

?>
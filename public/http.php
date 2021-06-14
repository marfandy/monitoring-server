<?php 
date_default_timezone_set("Asia/Makassar");
$now = date("Y-m-d H:i:s");

// //TELEGRAM
$token = '1322089322:AAGK9ZND6n3MUsw8GpnRYJhCs1UFjNUIoG0';
$user_id = '-477947928';

function tele($data){
	file_get_contents($data);
}


function url_tes ($url){
	$timeout = 3;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	$http_respond = curl_exec($ch);
	$http_respond = trim(strip_tags($http_respond));
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if (($http_code == "200") || ($http_code == "302"))
	{
		return true;
	} 
	else 
	{
		return false;
	}
	curl_close($ch);
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
	$querylog = "SELECT status FROM log_http where address ='". $row['address'] ."' order by created_at desc limit 1";
	$queryresult = $conn->query($querylog);
	$row1 = $queryresult->fetch_assoc();
	if($queryresult->num_rows == 0){
		$conn->query("INSERT INTO log_http (device_name,address,location,status,created_at) values ('".$row['device_name']."','".$row['address']."','".$row['location']."','".$row['status']."','".$now."')");
	}
	if (!url_tes($website)){
		$status = "Disconnect";
		if ($row1['status'] == 'Connect'){
			echo $website .' '.$status."\r";
			$conn->query("UPDATE address set status='".$status."' where address='".$row['address']."' ");
			$conn->query("INSERT INTO log_http (device_name,address,location,status,created_at) values ('".$row['device_name']."','".$row['address']."','".$row['location']."','".$status."','".$now."')");

			$message = 'http '.$website .' client errors(404)';
			$data = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=$user_id&text=$message";
			tele($data);
		} else {
			echo $website .' '.$status."\r";
		}
	} else {
		$status = "Connect";
		if ($row1['status'] == 'Disconnect'){
			echo $website .' '.$status."\r";
			$conn->query("UPDATE address set status='".$status."' where address='".$row['address']."' ");
			$conn->query("INSERT INTO log_http (device_name,address,location,status,created_at) values ('".$row['device_name']."','".$row['address']."','".$row['location']."','".$status."','".$now."')");

			$message = 'http '.$website .' successful responses(200)';
			$data = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=$user_id&text=$message";
			tele($data);
		} else {
			echo $website .' '.$status."\r";
		}
	}
}


?>
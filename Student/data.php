<?php 
$conn = new mysqli('localhost', 'root', '', 'webtech');
if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}
$result = $conn->query("SELECT uid FROM result");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo $row['uid'] . '<br>';
	}
}
?>
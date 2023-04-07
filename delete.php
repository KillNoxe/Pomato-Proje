<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "9036sinav";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


$data = $_GET["data"];
echo $data;
$sql = "DELETE FROM phone WHERE ID=$data";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
header('Location: index.php/../');
?>
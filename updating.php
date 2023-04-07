<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "9036sinav";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }




$Id = $_GET["Id"];
$Name = $_POST['Name'];
$Price = $_POST['Price'];
$Price = $Price / 1000;
$Marka = $_POST['marka'];
$Category = $_POST['category'];
$photo = basename($_FILES["fileToUpload"]["name"]);

$sql = "SELECT Image FROM Phone WHERE ID=$Id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(null == $photo){
    $Img = $row["Image"];
}else{
    $Img = "images/" . basename($_FILES["fileToUpload"]["name"]);
}

$sql = "UPDATE phone SET Name = '$Name',
        Image = '$Img',
        Price = $Price,
        markaid = $Marka,
        categoryid = $Category
        WHERE ID = $Id";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  header('Location: index.php/../');
?>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "9036sinav";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


$Name = $_POST['Name'];
$Price = $_POST['Price'];
$Image = 'images/' . basename($_FILES["fileToUpload"]["name"]);
$Marka = $_POST['marka'];
$Category = $_POST['category'];
$Price = $Price / 1000;

$sql ="INSERT INTO `phone` 
(`ID`, `Name`, `Image`, `Price`, `markaid`, `categoryid`) VALUES 
(NULL, '$Name', '$Image', '$Price', '$Marka', '$Category');
";

if ($conn->query($sql) === TRUE) {
    echo "Update Başarılı";
  } else {
    echo "Error updating record: " . $conn->error;
  }
header('Location: index.php/../');
?>
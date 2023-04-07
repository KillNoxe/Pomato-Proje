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

$form = "SELECT * from phone WHERE ID=$data";
$formeleman = $conn->query($form);
$formrow = $formeleman->fetch_assoc();

$sql = "SELECT * from marka";
$result = $conn->query($sql);
$sql2 = "SELECT * from category";
$result2 = $conn->query($sql2);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>pomato</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="main-layout ">



    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php/../"><img src="images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                    <li class="active"> <a href="index.php/../">Home</a> </li>
                                        <li> <a href="index.php/../?data=1">Android Telefon</a> </li>  
                                        <li> <a href="index.php/../?data=2">IOS Telefon</a> </li>  
                                        <li> <a href="index.php/../?data=3">Tuslu Telefon</a> </li>
                                        <li> <a href="ekle.php">Ekle</a> </li>  
                                        <li class="last">
                                            <a href=""><img src="images/search_icon.png" alt="icon" /></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="icon/call.png" />(+90) 262 321 13 80</li>
                                <li><img src="icon/email.png" />demo@gmail.com</li>
                                <li><img src="icon/loc.png" />Konumumuz</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
<?php
echo ' 
<form action="updating.php?Id='.$data.'" method="POST" enctype="multipart/form-data">
';
?>
    <br><br>
    <div class="form-group">
        <label for="">Adı :</label>

        <?php echo'
        <input value="'.$formrow["Name"].'" placeholder="Adı" class="form-control"  type="text" name="Name" id="name">        
        ';?>
    </div>
    <div class="form-group">
        <label for="">Fiyatı :</label>
        <?php 
        $fiyat = $formrow["Price"];
        if($fiyat < 1){
            $fiyat = $fiyat * 1000;
        }
        echo'
        <input value="'.$fiyat.'" placeholder="Fiyatı" class="form-control"  type="text" name="Price" id="price">
        ';?>
        </div>
    <div class="form-group">
        <label for="marka">Markayı Seçiniz:</label>
        <select class="form-control" style="height: 48.5px;" id="Marka" name="marka">
        <option>Seçiniz</option>
            <?php 
            while($row = $result->fetch_assoc()) {


                if($formrow["markaid"] == $row["markaid"]){
                    echo '
                    <option selected value="'.$row["markaid"].'">'.$row["MarkaName"].'</option>
                ';

                }else{
            echo '
                <option value="'.$row["markaid"].'">'.$row["MarkaName"].'</option>
            ';}



            }
            ?>
        
        </select>
    </div>    
    <div class="form-group">
        <label for="category">Kategoriyi Seçiniz :</label>
        <select class="form-control" style="height: 48.5px;" id="Category" name="category">
            <option>Seçiniz</option>
            <?php 
            while($row2 = $result2->fetch_assoc()) {
                if($formrow["categoryid"] == $row2["categoryid"]){
                    echo '
                <option selected value="'.$row2["categoryid"].'">'.$row2["CategoryName"].'</option>
            ';
                }else{
            echo '
                <option value="'.$row2["categoryid"].'">'.$row2["CategoryName"].'</option>
            ';}
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="photo">Fotoğrafı Seçiniz :</label>
        <input class="form-control"  type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <button id="button" type="submit" class="btn btn-default">Kaydet</button>
</form>
</body>
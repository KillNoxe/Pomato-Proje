<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "9036sinav";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$sql = "SELECT phone.ID,phone.Name,phone.Image,phone.Price,marka.MarkaName,category.CategoryName,category.categoryid
from phone
INNER JOIN marka
on phone.markaid = marka.markaid
INNER JOIN category
on phone.categoryid = category.categoryid
ORDER BY phone.ID
";
$result = $conn->query($sql);
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
<!-- body -->

<body class="main-layout ">
    <!-- loader  -->
    <!-- <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div> -->
    <!-- end loader -->
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
                                        <li> <a href="?data=1">Android Telefon</a> </li>  
                                        <li> <a href="?data=2">IOS Telefon</a> </li>  
                                        <li> <a href="?data=3">Tuslu Telefon</a> </li>
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

    <!-- about -->
    <!-- brand -->
    <div class="brand">
        <div class="brand-bg">
            <div class="container">
                <div class="row">
                <?php 
                
                

                while($row = $result->fetch_assoc()) {

                    if(isset($_GET["data"])){
                        $data = $_GET["data"];
                    }else{
                        $data = 0;
                    }

                    if($row["Price"] < 1){
                        $Price = $row["Price"] * 1000;
                        }else{
                            $Price = $row["Price"];
                        }
                    $categoryid = $row["categoryid"];
                    if($data == $categoryid){
                    echo '
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                    <div class="brand_box">
                        <img src="'.$row["Image"].'" alt="img" />
                        <h3><strong class="red">'.$row["Name"].'</strong></h3>
                        <span>'.$row["MarkaName"].'</span>
                        <span>'.$row["CategoryName"].'</span>
                        <h3><strong class="red">'.$Price.' TL</strong></h3>
                        <a href="#">Düzenle</a>
                        <a href="delete.php?data='.$row["ID"].'">Sil</a>
                    </div>
                    </div>
                    ';
                    }else if ($data == 0){
                        echo '
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                    <div class="brand_box">
                        <img src="'.$row["Image"].'" alt="img" />
                        <h3><strong class="red">'.$row["Name"].'</strong></h3>
                        <span>'.$row["MarkaName"].'</span>
                        <span>'.$row["CategoryName"].'</span>
                        <h3><strong class="red">'.$Price.' TL</strong></h3>
                        <a href="update.php?data='.$row["ID"].'">Düzenle</a>
                        <a href="delete.php?data='.$row["ID"].'">Sil</a>
                    </div>
                    </div>
                    ';

                    }
                }
                


                ?>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row pdn-top-30">
                    <div class="col-md-12 ">
                        <div class="footer-box">
                            <div class="headinga">
                                <h3>Adres</h3>
                                <span>İzmit Mesleki ve Teknik Anadolu Lisesi</span>
                                <p>(+90) 262 321 13 80
                                    <br>demo@gmail.com</p>
                            </div>
                            <ul class="location_icon">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="copyright">
                <div class="container">
                    <p>© 2019 All Rights Reserved. Design By<a href="https://html.design/"> Free Html Templates</a></p>
                </div>
            </div> -->
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>
<?php session_start();
include ('dbconfig.php');
if (empty($_SESSION['id'])) :
    header('Location:index.html');
endif;
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon2.png" type="">

    <title> The Hunger Bounce </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

    <header class="header_section_cus" style="background-color: aliceblue;">
        <div style="margin-left:30px;" class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="homepage.php">
                    <span>
                        The Hunger Bounce
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div style="margin-left: 43%;" class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mx-auto ">
                        <li class="nav-item ">
                            <a class="nav-link" href="food.php"> Food <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item" style="margin-right:-50px;">
                            <a class="nav-link" href="grocery.php"> Grocery <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <a style="color:black;" class="cart_link" href="cart.php">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                                style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </a>
                        <div class="dropdown">
                            <a style="margin-left:30px; margin-right:-500px" href="" class="user_link">
                                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-content">
                                <a href="cus_profile.php">Profile</a>
                                <a href="cus_order.php">Orders</a>
                                <a href="logout_process.php">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->

    <div class="search_slider" style="background-color: white;">
        <form method="GET">
            <div class="input-group" style="width:40%; margin-left:32%; margin-top:3% ">
                <input type="text" name="search" class="form-control" placeholder="Search for food grocery" required>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit" name="searchbtn">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
    <!--end of search bar-->
    <div style="margin-left:200px; margin-top: 40px;">
        <div style="margin-bottom: 40px;">
            <?php
                if(isset($_GET['searchbtn']))
                {
                    $food_query = pg_query($con , "select * from thb.food_items where lower(name) like lower('%$_GET[search]%')");
                    $count = pg_num_rows($food_query);
                    if($count > 0)
                    {
                        while($row = pg_fetch_assoc($food_query))
                        {
                            echo ' 
            <div class="conatiner"> 
                    <div class="row"> 
                        <div style="margin-left: 5px; height:400px; width:300px;"  class="card my-3 col-3 border border-dark" style="margin-left: 65px; height:400px; width:300px;">
                            <form method="POST" action="add_to_cart.php? item_id='.$row['item_id'].'">
                                <img style="margin-top:20px; margin-left:-6px; margin-bottom:10px; height:220px; width:220px;" src="uploads/'.$row['image'].'" class="card-img-top">
                                <div style="margin-left:-40px;">
                                    <h5 style=" font-weight:bold; margin-bottom:23px;"> '.$row['name'].' </h5>
                                    <h5 style="margin-bottom:23px;" class="card-title">
                                    Price: 
                                    ???'.$row['price'].'</h5>
                                    
                                    <input type="text" name="is_food" value = "true" style="display:none"> 
                                    <input type="number" name="item_id" value = "'.$row['item_id'].'" style="display:none">      
                                    <button  style="margin-top:10px;" class="btn btn-primary" name="addtocart"type="submit">Add To Cart</button>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>';
                        }
                    }
                    else
                    {
                        echo "<script type='text/javascript'>alert('Oops! item not found!'); document.location = 'food.php'</script>";
                    }
                }
            ?>
        </div>
        <div class="conatiner">
            <div class="row">
                <?php
            $food_query2 = pg_query($con , "select * from thb.food_items ");
            while($row2 = pg_fetch_assoc($food_query2)){
                // print_r($row2);
                $food_query3 = pg_query($con,"select res_id,name from thb.restaurant where res_id = '$row2[res_id]'");
                $row3 = pg_fetch_assoc($food_query3);
                ?>
                <div style="margin-left: 65px; height:400px; width:300px;" class="card my-3 col-3 border border-dark">
                    <form method="POST" action="add_to_cart.php">
                        <img style="margin-top:20px; margin-left:-6px; margin-bottom:10px; height:220px; width:220px;" class="card-img-top" src="uploads/<?php echo $row2['image']?>" alt="Card image cap">
                        <div style="margin-left:-40px;">
                            <h5 style=" font-weight:bold; margin-bottom:23px;" class="card-title">
                                <?php echo $row2['name']?>
                            </h5>
                            <h5 style="margin-bottom:23px;" class="card-title">
                            Price: 
                                ???<?php echo $row2['price']?>
                            </h5>
                            <a href="resturent_info.php?res_id=<?php$row3['res_id']?>;">
                                <h5 style="min-inline-size: fit-content;">
                                    <?php echo $row3['name']?>
                                </h5>
                            </a>
                            <input type="hidden" name="is_food" value="true">
                            <input type="hidden" name="res_id" value="<?php echo $row3['res_id']?>">
                            <input type="number" name="item_id" value="<?php echo $row2['item_id']?>"
                                style="display:none">
                            <button style="margin-top:10px;" class="btn btn-primary" name="addtocart" type="submit">Add To Cart</button>
                    </form>
                </div>
            </div>
            <?php
                
            }
        ?>
        </div>
    </div>
    </div>
    <!-- footer section -->
    <footer style="background-color: aliceblue" class="footer_section">
        <div class="container">
            <div class="row">

                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            The Hunger Bounce
                        </a>
                        <p>
                            Food brings people togather
                        </p>
                        <!-- <a href="about.html"><u>About Us</u></a> -->
                    </div>
                </div>

                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Contact Us
                        </h4>
                        <div class="contact_link_box">
                            <a
                                href="https://www.google.co.in/maps/place/DA-IICT/@23.1885419,72.6267215,17z/data=!4m5!3m4!1s0x395c2a3c9618d2c5:0xc54de484f986b1fa!8m2!3d23.188537!4d72.6289155">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +91 0123456789
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    thb-contact@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 footer-col">
                    <div  class="footer_social">
                        <a  href="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="">The Hunger Bounce</a><br><br>
                </p>
            </div>
        </div>



        <!-- footer section -->

        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- owl slider -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
        </script>
        <!-- isotope js -->
        <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
        <!-- nice select -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js">
        </script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <!-- Google Map -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
            </script>
        <!-- End Google Map -->

</body>

</html>
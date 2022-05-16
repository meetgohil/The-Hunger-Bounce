<?php session_start();
include('dbconfig.php');
if (empty($_SESSION['id'])) :
    header('Location:index.html');
endif;
?>


<!DOCTYPE html>
<html lang="en">

<head>
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

<body style="height:100%">
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
                                <a href="order.php">Orders</a>
                                <a href="logout_process.php">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->

    <div style="margin-top:25px; margin-left: 350px; width:60%;" class="res-dash">
        <span style="margin-left: 250px; font-size:30px;">
            Welcome,
            <?php include('dbconfig.php'); 
                $sql = "select * from thb.customer where mobile_no = '$_SESSION[id]'";
                $query=pg_query($con,$sql);
                // $row1 = pg_fetch_assoc
                print_r($row);
                echo $row['1'];
            ?>
        </span>
        <form style="margin: 40px 200px 20px 200px; padding-top: 0px; padding-bottom:40px;" action="cus_update.php" method = "POST">
            
            <!-- Cus name Input-->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem;">Name:</p> 
                <input type="text" id="name" class="form-control" placeholder="Your name" name="cus_name" value="<?php echo $row['1'];?>" readonly/>
            </div>

            <!-- Mobile no. input -->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; margin-top:20px;">Mobile No:</p> 
                <input type="number" id="mobile_no" class="form-control" placeholder="Mobile No."
                    name="cus_mobile_no"  value="<?php echo $row['0'];?>" readonly />
            </div>

            <!-- Email -->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; margin-top:20px;">Email</p> 
                <input type="email" id="email" class="form-control" placeholder="Email"
                    name="cus_email"  value="<?php echo $row['3'];?>" readonly />

            </div>
            <!-- Cus Pass -->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; margin-top:20px;">Password:</p> 
                <input type="text" id="password" class="form-control" placeholder="Password"
                    name="cus_password"  value="<?php echo $row['2'];?>" readonly />
            </div>

            <div class="res-update-button">
                <button style="margin-left:-15px;"type="button" class="btn btn-primary" id="update">Update</button>
                <div>
                <button type="submit" class="btn btn-primary" id="save" name='save' style="display : none; margin-left: -60px; margin-right:10px;">Save</button>

                <button type="button" class="btn btn-danger" id="cancel"style="display:none; margin-top:-38px;margin-left:50px;" >Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <script>
    document.getElementById('update').onclick = function() {
            document.getElementById('name').readOnly =false;
            document.getElementById('email').readOnly =false;
            document.getElementById('password').readOnly =false;
            // document.getElementById('mobile_no').readOnly =false;
            document.getElementById('save').style.display = "block";
            document.getElementById('cancel').style.display ="block";
            document.getElementById('update').style.display ="none";
    };
    document.getElementById('cancel').onclick = function() {
   
            document.getElementById('save').style.display = "none";
            document.getElementById('cancel').style.display ="none";
            location.reload();
    };
    </script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
</body>

</html>
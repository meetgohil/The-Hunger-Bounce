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

    <title> Restaurant Deshboard </title>

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
    <header style="margin-right: 200px; margin-bottom: 40px;" class="header_section" style="background-color: white;">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <div style="width:100%">
                    <a class="navbar-brand" href="res_menu.php">
                        <span >
                            The Hunger Bounce Business
                        </span>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div style="margin-left: 380px;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" href="res_menu.php">Edit Menu <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="res_order.php">Received Orders <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="res_dashboard.php">Profile<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout_process.php"> Logout <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
        </div>
        </nav>
        </div>
    </header>
    <?php
        include('dbconfig.php');
        $query = pg_query($con, "select * from thb.restaurant where res_id='$_SESSION[id]'");
        $raw = pg_fetch_row($query);
        // print_r($raw);
        // print_r($raw);
    ?>
    <!-- Text input -->
    <div style="margin-top:-40px;" class="res-dash">
        <span style="margin-left: 450px; font-size:30px;">
            <?php include('dbconfig.php'); 
                $sql = "select name from thb.restaurant where res_id = '$_SESSION[id]'";
                $query=pg_query($con,$sql);
                $row = pg_fetch_row($query);
                echo $row[0];
            ?>
        </span>
        <form style="margin: 30px 300px 0px 300px; padding-top: 0px; padding-bottom:30px;" action="res_update.php" method = "POST">
            
            <!-- Res name Input-->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; ">Restaurant Name:</p>
                <input type="text" id="name" class="form-control" placeholder="Restuatrant Name" name="res_name" value="<?php echo $raw['1'];?>" readonly/>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; margin-top:20px;">Email:</p>
                <input type="email" id="email" class="form-control" placeholder="E-mail Address"
                    name="res_email"  value="<?php echo $raw['2'];?>" readonly />

            </div>

            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; margin-top:20px;">Password:</p>
                <input type="text" id="password" class="form-control" placeholder="Password"
                    name="res_password" value="<?php echo $raw['3'];?>" readonly />

            </div>

            <!--Pin Code -->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; margin-top:20px;">Pin Code:</p>
                <input type="number" id="pin-code" class="form-control" placeholder="Pin Code" name="res_pincode" value="<?php echo $raw['4']; ?>"
                    readonly />

            </div>

            <!-- Address input -->
            <div class="form-outline mb-4">
            <p style="margin-bottom:0.5rem; margin-top:20px;">Address:</p>
                <input class="form-control" type="text" id="address" placeholder="Address" name="res_address"  value="<?php echo $raw['5']; ?>" readonly>
            </div>


            <div style="margin-top:25px;"class="res-update-button">
                <button type="button" class="btn btn-primary" id="update">Update</button>
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
            document.getElementById('pin-code').readOnly =false;
            document.getElementById('address').readOnly =false;
            document.getElementById('password').readOnly = false;
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
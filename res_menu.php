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

<body style="height:100px;" >
    <header style="margin-right: 200px; margin-bottom: 40px;" class="header_section" style="background-color: white;">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="res_menu.php">
                    <span >
                        The Hunger Bounce Business
                    </span>
                </a>

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
    <!-- <div style="margin-left:50px; margin-right: 50px; background-color: white"> -->
   
    <div class="res-menu">
        <span  style="margin-left: 650px; margin-top:30px; font-size:30px;">
            <?php include('dbconfig.php'); 
                $sql = "select name from thb.restaurant where res_id = '$_SESSION[id]'";
                $query=pg_query($con,$sql);
                $row = pg_fetch_row($query);
                echo $row[0];
            ?>
        </span>
        <div>
            <a href = "add_item_form.php" class="btn btn-primary" style="margin-left:700px; margin-bottom:30px; margin-top: 40px;">Add product</a>
        </div>  
        <table class="res-table">
            <thead>
                <tr>
                    <!-- <th></th> -->
                    <th style="width:25%; height:25%;">Image</th>
                    <th style="width:15%;">Dish Name</th>
                    <th style="width:10%;">Price</th>
                    <th style="width:10%;">Type</th>
                    <th style="width:10%;">Category</th>
                    <th style="width:40%;">Discription</th>
                    <th style="width:50%;">Edit/Remove </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('dbconfig.php');
                $query = pg_query($con, "select * from thb.food_items  where res_id='$_SESSION[id]' Order by item_id");

                while ($inx = pg_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><img style="height:70%; width:70%; border-radius:10px;" src="uploads/<?= $inx['image'] ?>" style="width : 10%"> </td>
                        <td><?php echo $inx['name']; ?></td>
                        <td><?php echo $inx['price']; ?></td>
                        <td style="width:100px;"><?php if ($inx['type'] == 't') {
                                echo "VEG";
                            } else {
                                echo "NON-VEG";
                            } ?></td>
                        <td><?php echo $inx['category']; ?></td>
                        <td style="line-height:1.5;"><?php echo $inx['description']; ?></td>
                        <td><a href="edit_item_form.php?id=<?php echo $inx['item_id'];?>"  class="btn btn-success" style="margin-bottom: 10px;">Edit</a>
                        <a href="delete_item.php?id=<?php echo $inx['item_id'];?>"  class="btn btn-danger" >Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
   
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
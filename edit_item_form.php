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

    <title> Edit_item </title>
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

<body >
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
    <?php
        $item_id = $_GET['id'];
        $sql1 = "select * from thb.food_items where item_id = '$item_id'";
        $query1 = pg_query($con,$sql1);
        $row2 = pg_fetch_assoc($query1);
    ?>
    <div style="height: 555px;  padding-top: 50px;" class="edit-item">
        <span  style="margin-left: 500px; font-size:30px;">
        <?php include('dbconfig.php'); 
                $sql = "select name from thb.restaurant where res_id = '$_SESSION[id]'";
                $query=pg_query($con,$sql);
                $row = pg_fetch_row($query);
                echo $row[0];
            ?>
        </span>
        <form action="edit_item.php" enctype="multipart/form-data" method="POST">
            <p style="margin-left:140px; margin-top:60px;">Edit your item image here</p>
            <input id="id" type="number" name="item_id" value="<?php echo $row2['item_id']?>" style="display : none">
            <input id="old_image" type="text" name="old_image" value="<?php echo $row2['image']?>" style="display : none;">
            <div style="float:left ; width: 40%;">
                <div class="form-outline mb-4">
                    <img src="uploads/<?php echo $row2['image']?>" id="item_image_pri" onclick="tg()"
                        style="width: 380px; height:290px; margin-top:20px; margin-left: 90px;" />
                    <input type="file" onchange="readURL(this)" id="item_image" class="form-control"
                        name="product_image" style="margin-top: 25px;width: 250px;display: none;" />
                </div>
            </div>
            <div style="float: right; width: 50%; margin-right: 80px;">
                <div class="form-outline mb-4">
                    <input type="text" id="itemName" class="form-control" name="food_name" placeholder="Item Name"
                        value="<?php echo $row2['name']?>" required />
                    <!-- <label class="form-label" for="itemName">item_name</label> -->
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="price" class="form-control" name="price" placeholder=" Price"
                        value="<?php echo $row2['price']?>" required />
                    <!-- <label class="form-label" for="price">price</label> -->
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="category" class="form-control" name="category" placeholder="Category"
                        value="<?php echo $row2['category']?>" required />
                    <!-- <label class="form-label" for="category">category</label> -->
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="discription" class="form-control" name="discription" placeholder="About Item"
                        value="<?php echo $row2['description']?>" required />
                    <!--    <label class="form-label" for="discription">discription</label> -->
                </div>
                <div class="form-check form-check-inline" style="margin-top:10px;">
                    <input class="form-check-input" type="radio" name="type" id="inlineCheckbox1" value="veg" <?php echo
                        ($row2['type']=='t' )?'checked':'' ?> />
                    <label class="form-check-label" for="inlineCheckbox1" name="type"
                        style="margin-right:15px">Veg</label>

                    <input class="form-check-input" type="radio" id="inlineCheckbox2" name="type" value="nonveg" <?php
                        echo ($row2['type']=='f' )?'checked':'' ?> />
                    <label class="form-check-label" for="inlineCheckbox2" name="type" value="nonveg">Non-Veg</label>
                </div>

                <div style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary" style="margin-right:20px;" name="upload">
                        Save changes
                </button>
                <a href="res_menu.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function tg() {
            document.getElementById('item_image').click();
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#item_image_pri').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
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
<?php session_start();
include ('dbconfig.php');
if (empty($_SESSION['id'])) 
    header('Location:index.html');

    

    if(isset($_POST['make_order'])){
        //  print_r($_POST);
        $cart_details = pg_query($con,"select * from thb.food_cart where mobile_no = '$_SESSION[id]'");
        if(pg_num_rows($cart_details) == 0){
            echo "<script type='text/javascript'>alert('First Add product in cart');document.location='food.php'</script>";
        }

        $total_amount = $_POST['total_amount'];
        $order_date = date("Y-m-d");
        $create_order = pg_query($con , "INSERT INTO thb.order (total_amount, address, date, status, mobile_no, is_menu)
            VALUES ('$total_amount','$_POST[address]','$order_date','preparing','$_SESSION[id]','true');
        ");

        $order_id = pg_fetch_assoc(pg_query($con,"select order_id from thb.order 
        where mobile_no = '$_SESSION[id]'
        order by order_id DESC limit 1"));

        while($row = pg_fetch_assoc($cart_details)){
            print_r($row);
            $p = pg_fetch_assoc(pg_query($con,"select price from thb.food_items where item_id = '$row[item_id]'"));
            $amount = $row['quantity']*$p['price'];
            $add_order_item = pg_query($con,"INSERT INTO thb.ordered_food (item_id, order_id, quantity, price)
                VALUES ('$row[item_id]','$order_id[order_id]','$row[quantity]','$amount'); ");
        }

        $query3 = pg_query("DELETE FROM thb.food_cart
        WHERE mobile_no = '$_SESSION[id]';");
        echo "<script type='text/javascript'>document.location='homepage.php'</script>";


    }
?>
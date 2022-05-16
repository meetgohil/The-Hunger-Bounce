<?php session_start();
include ('dbconfig.php');
if (empty($_SESSION['id'])) 
    header('Location:index.html');

    
    if(isset($_POST['mod_quantity'])){
       
        $query3 = pg_query($con,"UPDATE thb.food_cart
        SET  quantity='$_POST[mod_quantity]'
        WHERE id = '$_POST[id]' and mobile_no= '$_SESSION[id]'");
        echo "<script type='text/javascript'>document.location='cart.php'</script>";
    }
    elseif(isset($_POST['addtocart'])){

        $count_cart = pg_query($con,"select * from thb.food_cart where mobile_no='$_SESSION[id]' ");
        // print_r($count_cart);
        $flag = 0;
        
        if(pg_num_rows($count_cart) > 0){
            while($row4 = pg_fetch_assoc($count_cart)){
                $res_id = pg_fetch_assoc(pg_query($con,"select res_id from thb.food_items where item_id = '$row4[item_id]'"));
                if($res_id['res_id'] != $_POST['res_id']){
                    $flag = 1;
                     echo "<script type='text/javascript'>alert('You can not add diffrent Restaurant product');document.location='food.php'</script>";
                }
                else if($row4['item_id'] == $_POST['item_id']){
                    $flag = 1;
                    echo "<script type='text/javascript'>alert('Item already in cart');document.location='food.php'</script>";
                }
            }
        }
        
        if($flag == 0){
            $query2 = pg_query($con,"INSERT INTO thb.food_cart(
                item_id, quantity, is_food ,mobile_no)
           VALUES ( '$_POST[item_id]', '1', 'true','$_SESSION[id]');");
            echo "<script type='text/javascript'>document.location='food.php'</script>";
        }
        
        
       
    }
    elseif(isset($_POST['remove'])){
        $query3 = pg_query("DELETE FROM thb.food_cart
        WHERE id='$_POST[id]'");
        echo "<script type='text/javascript'>document.location='cart.php'</script>";
    }


    
    
?>
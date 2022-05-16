<?php session_start();
include "dbconfig.php";
if (empty($_SESSION['id'])) :
   header('Location:index.php');
endif;

if (isset($_POST['upload']) && isset($_FILES['product_image'])) 
{
    $p_image = $_FILES['product_image']['name'];

    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $type = $_POST["type"];
    $category = $_POST['category'];
    $discription = $_POST['discription'];
	$ans = ($type == "veg") ? 't': 'f';

	$img_name = $_FILES['product_image']['name'];
	$img_size = $_FILES['product_image']['size'];
	$tmp_name = $_FILES['product_image']['tmp_name'];
	$error = $_FILES['product_image']['error'];

	$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
	$allowed_exs = array("jpg", "jpeg", "png"); 
	$new_img_name = (empty($img_name)) ?  $_POST['old_image']: uniqid("IMG-", true).'.'.$img_ex_lc;
	$img_upload_path = 'uploads/'.$new_img_name;
	move_uploaded_file($tmp_name, $img_upload_path);

	$sql = "UPDATE thb.food_items

	SET name='$food_name', price='$price', type='$ans', category='$category', description='$discription', res_id='$_SESSION[id]', image='$new_img_name'
	WHERE item_id = '$_POST[item_id]'; ";
	$q = pg_query($con, $sql);
	if($q){
		echo "<script type='text/javascript'>document.location='res_menu.php'</script>";
	}
	else {
		print_r($q);
	}
}
else{
	echo "<script type='text/javascript'>alert(Provide right input');document.location='res_menu.php'</script>";
}
	
    
?>




<?php session_start();
include "dbconfig.php";
if (empty($_SESSION['id'])) :
   header('Location:index.php');
endif;


	
	$query1 = pg_query($con,"select image from thb.food_items where item_id = '$_GET[id]'"); 
	$query2 = pg_query($con,"DELETE FROM thb.food_items
	WHERE item_id = '$_GET[id]';");
	
	$row = pg_fetch_assoc($query1);
	unlink("uploads/".$row['image']);
	
	if($query1 and $query2){
		echo "<script type='text/javascript'>document.location='res_menu.php'</script>";
	}
	else{
		echo "<script type='text/javascript'>alert(data not deleted);document.location='res_menu.php'</script>";
	}
	
	

	
    
?>
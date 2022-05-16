<?php session_start();
include('dbconfig.php');
if (empty($_SESSION['id'])) :
    header('Location:index.html');
endif;

if(isset($_POST['save'])){
    $name = $_POST['del_name'];
    $email = $_POST['del_email'];
    $password = $_POST['del_password'];
    $pincode = $_POST['del_pincode'];

    $sql = " UPDATE thb.delivery_person
    SET name='$name', email='$email',  pincode='$pincode', pass='$password'
	WHERE d_id = '$_SESSION[id]';";
    $query = pg_query($con,$sql);
    echo "<script type='text/javascript'>;
    document.location='del_profile.php'</script>";
}
?>
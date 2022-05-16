<?php session_start();
include('dbconfig.php');
if (empty($_SESSION['id'])) :
    header('Location:index.html');
endif;

if(isset($_POST['save'])){
    $name = $_POST['cus_name'];
    $email = $_POST['cus_email'];
    $password = $_POST['cus_password'];
    $mobile_no = $_POST['cus_mobile_no'];

    $sql = " UPDATE thb.customer
    SET name='$name', email='$email',  mobile_no='$mobile_no', pass='$password'
	WHERE mobile_no = '$_SESSION[id]';";
    $query = pg_query($con,$sql);
    echo "<script type='text/javascript'>;
    document.location='cus_profile.php'</script>";
}
?>
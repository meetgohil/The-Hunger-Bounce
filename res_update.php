<?php session_start();
include('dbconfig.php');
if (empty($_SESSION['id'])) :
    header('Location:index.html');
endif;

if(isset($_POST['save'])){
    $name = $_POST['res_name'];
    $address = $_POST['res_address'];
    $pin_code = $_POST['res_pincode'];
    $email = $_POST['res_email'];
    $pass = $_POST['res_password']

    $sql = " UPDATE thb.restaurant
    SET name='$name', email='$email',  pin='$pin_code', address='$address' pass="$pass" WHERE res_id = '$_SESSION[id]';";
    $query = pg_query($con,$sql);
    echo "<script type='text/javascript'>
    document.location='res_dashboard.php'</script>";
}
?>
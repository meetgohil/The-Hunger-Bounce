<?php session_start();

include('dbconfig.php');

if(isset($_POST['res_signup_btn']));
{
    $res_name = $_POST['res_name'];
    $res_password = $_POST['res_password'];
    $res_address= $_POST['res_address'];
    $res_pincode = $_POST['res_pincode'];
    $res_email = $_POST['res_email'];
    
    $sql = "INSERT INTO thb.restaurant(name, email, pass, pin, address)
             VALUES ('$res_name','$res_email','$res_password','$res_pincode','$res_address');";
    $query=pg_query($con,$sql);
    if(!$query)
    {
        echo "<script type='text/javascript'>alert('Server is Currently Busy:(');document.location='res_login.html'</script>";    
    }
    echo "<script type='text/javascript'>alert('Registration Succesfull');document.location='res_login.html'</script>";
}

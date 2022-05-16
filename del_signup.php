<?php session_start();

include('dbconfig.php');

if(isset($_POST['del_signup_btn']));
{
    // print_r($_POST);
    $del_name = $_POST['del_name'];
    $del_password = $_POST['del_password'];
    $del_email = $_POST['del_email'];
    $del_pin = $_POST['del_pincode'];

    $sql1 = "SELECT* FROM thb.delivery_person where email='$del_email'";
    $row1=pg_num_rows(pg_query($con, $sql1));

    if($row1==0)
    {
        $sql = "INSERT INTO thb.delivery_person(name, email, status, pass, pincode)
        VALUES ('$del_name', '$del_email', 'false', '$del_password', '$del_pin');";
        $query=pg_query($con,$sql);

        if(!$query)
            echo "<script type='text/javascript'>alert('Server is Bussy:(');document.location='index.html'</script>"; 
        else 
            echo "<script type='text/javascript'>alert('Registration Succesfull');document.location='del_login.html'</script>";
    }
    else
        echo "<script type='text/javascript'>alert('Already Registered');document.location='del_login.html'</script>";
    
}
?>

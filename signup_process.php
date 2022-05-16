<?php 

include('dbconfig.php');

if(isset($_POST['customer_signup']));
{
    $cus_mobile = $_POST['customer_mobile_no'];
    $cus_password = $_POST['customer_password'];
    $cus_email = $_POST['customer_email'];
    $cus_name = $_POST['customer_name'];

    $sql1 = "select * from thb.customer where mobile_no = '$cus_mobile'";
    $query1=pg_num_rows(pg_query($con,$sql1));
    if($query1 == 0){
        $sql2 = "INSERT INTO thb.customer(mobile_no, name, pass ,email)
            VALUES ('$cus_mobile', '$cus_name','$cus_password','$cus_email')";
        $query2=pg_num_rows(pg_query($con,$sql2));
        echo "<script type='text/javascript'>alert('Registration Successfull');document.location='login.html'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Already exists, Please Login');document.location='login.html'</script>";
    }    
}
?>
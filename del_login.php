<?php session_start();
include('dbconfig.php');
if(isset($_POST['del_login_btn']))
{
    $del_password = $_POST['del_password'];    
    $del_email = $_POST['del_email'];
    $sql = "select * from thb.delivery_person where email = '$del_email' and pass = '$del_password';";
    
    $query=pg_query($con,$sql);
    $row=pg_fetch_array($query);
    $counter=pg_num_rows($query);

    if ($counter == 1)
    {
        $_SESSION['id'] = $row['d_id'];
        echo "<script type='text/javascript'>alert('Welcome on Your Dashboard!');document.location='del_dashboard.php'</script>";
    }
    else 
    {
        echo "<script type='text/javascript'>alert('Invalid email or Password!');document.location='del_login.html'</script>"; 
    }
}

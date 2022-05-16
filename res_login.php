<?php session_start();

include('dbconfig.php');

if(isset($_POST['res_login_btn']));
{
   
    $res_password = $_POST['res_password'];
    $res_email = $_POST['res_email'];
    $sql = "select * from thb.restaurant where email = '$res_email' and pass = '$res_password';";
    $query=pg_query($con,$sql);

    $row=pg_fetch_array($query); 
    $counter=pg_num_rows($query);
    // $id=$row['res_id'];
    // echo $counter;
    if ($counter == 0)
    {
        echo "<script type='text/javascript'>alert('Invalid Username or Password!');document.location='res_login.html'</script>";
    }
    else
    {
        $_SESSION['id'] = $row['res_id'];
        // print_r($_SESSION['id']);
        echo "<script type='text/javascript'>alert('Welcome on Your Dashboard!');
        document.location='res_menu.php'</script>";
      
    }
   

}

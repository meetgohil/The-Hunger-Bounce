<?php session_start();

include('dbconfig.php');

if(isset($_POST['customer_login']));
{
    
   $pass = $_POST['customer_password'];
   $mobile = $_POST['customer_mobile_no'];

   $sql = "select * from thb.customer where mobile_no = '$mobile' and pass = '$pass'";
   $query=pg_query($con,$sql);

   $row=pg_fetch_array($query);   
   $counter=pg_num_rows($query);
   $id=$row['mobile_no'];

   if ($counter == 0)
   {
      echo "<script type='text/javascript'>alert('Invalid Usrename or Password!');
      document.location='index.html'</script>";
   }
   else
   {
      $_SESSION['id']=$mobile;  
      echo "<script type='text/javascript'>document.location='homepage.php'</script>";
   }
}

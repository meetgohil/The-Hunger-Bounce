<?php session_start();
if(empty($_SESSION['id'])):
    header('Location : index.html');
endif;
?>
<!DOCTYPE html>
<html>
<body>
    <div style="width:150px;margin:auto;height:500px;margin-top:300px">

    <?php
     include('dbconfig.php');
     session_destroy();

     echo '<meta http-equiv="refresh" content="2;url=login.php">';
     echo '<progress max=100><strong>Progress: 60% done.</strong></progress><br>';
     echo '<span class="itext">Logging out please wait!...</span>';
     echo "<script type='text/javascript'>document.location='index.html'</script>";
    ?>
    </div>

</body>
</html>
          
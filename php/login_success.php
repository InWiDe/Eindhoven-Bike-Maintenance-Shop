
<?php
 //login_success.php
 session_start();
 if(isset($_SESSION["inputEmail"]))
 {
     echo '<h3>Login Success, Welcome - '.$_SESSION["inputEmail"].'</h3>';
 }
 else
 {
     header("Location:SignIn.php");
 }
 ?>
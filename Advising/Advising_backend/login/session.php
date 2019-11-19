<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT admin_username FROM admins WHERE admin_username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

   $login_session = $row['admin_username'];

   echo $login_session;


   $time = $_SERVER['REQUEST_TIME'];

   // if the user logs out it will kill the session   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
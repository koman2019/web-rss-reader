<?php
   require_once '/includes/db.php'; // The mysql database connection script

   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($mysqli,"select username, userid from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_name = $row['username'];
   $login_userid = $row['userid'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
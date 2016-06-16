<?php
   $db = mysql_connect("localhost", "root");
   mysql_select_db("bug_hound", $db);
   session_start();

   if(!isset($_SESSION['user'])){
      header("location:login.php");
   }
?>
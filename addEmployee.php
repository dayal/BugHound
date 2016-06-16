<?php
   error_reporting(0);
   include('session.php');
   if (!$_SESSION['isAdmin']) {
       header("location:login.php");         
   }
?>
<?php
    $db = mysql_connect("localhost", "root");
    mysql_select_db("bug_hound", $db);
    $sql = "INSERT INTO employee (username, password, name, is_admin) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[name]', '$_POST[isAdmin]')";
    $result = mysql_query($sql);
    echo mysql_error($db) . "\n";

    include 'employee.php';
?>

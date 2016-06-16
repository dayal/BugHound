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
    $sql = "UPDATE area SET name = '$_POST[name]' WHERE id = '$_POST[id]'";
    $result = mysql_query($sql);
    echo mysql_error($db) . "\n";

    $_GET['program_id'] = $_POST['program_id'];
    include 'areas.php';
?>

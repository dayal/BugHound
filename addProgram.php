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
    $sql = "INSERT INTO program (name, rel, version) VALUES ('$_POST[name]', '$_POST[release]', '$_POST[version]')";
    $result = mysql_query($sql);
    echo mysql_error($db) . "\n";

    include 'program.php';
?>

<?php
   error_reporting(0);
   include('session.php');
   if (!$_SESSION['isAdmin']) {
       header("location:login.php");         
   }
?>

<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <h1>Database Maintenance</h1>
    <h4>
        <a href="program.php">View/Edit Programs</a>
    </h4>

    <h4>
        <a href="employee.php">View/Edit Employees</a>
    </h4>

    <h4>
        <a href="export.php">Export Data</a>
    </h4>

    <a href="index.php" class="btn btn-default">Back</a>
</div>
</body>
</html>
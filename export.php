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
    <h1>Export Data</h1>
    
    <h4>
        <a href="exportProgram.php">Export Program Table</a>
    </h4>
    
    <h4>
        <a href="exportArea.php">Export Area Table</a>
    </h4>

    <h4>
        <a href="exportEmployee.php">Export Employee Table</a>
    </h4>

    <h4>
        <a href="exportBugReport.php">Export Bug Report Table</a>
    </h4>

</div>
</body>
</html>




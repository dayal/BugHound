<?php
   error_reporting(0);
   include('session.php');
?>

<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <h1>Bughound</h1>

    <h4>
        <a href="newReport.php">New Bug Report</a>
    </h4>

    <h4>
        <a href="searchReport.php">Search For Existing Bug Report</a>
    </h4>
    <?php
        if ($_SESSION['isAdmin']) {
            echo "<h4><a href=\"databaseMaintenance.php\">Database Maintenance</a></h4>\n";
        }
    ?>
   



    <hr>
    <a class="btn btn-default" href="logout.php">Logout</a>
</div>
</body>
</html>
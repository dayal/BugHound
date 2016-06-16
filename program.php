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
    <h1>Programs</h1>
    <table class="table">
        <tr>
            <th>Program Name</th>       
            <th>Release</th>
            <th>Version</th>
            <th></th>
        </tr>  
        <?php
            $db = mysql_connect("localhost", "root");
            mysql_select_db("bug_hound",$db);
            $sql = "SELECT name, rel, version, id FROM program";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_row($result)) {
                printf("<tr><td>%s</td><td>%s</td><td>%s</td><td><a href='areas.php?program_id=%s'>Areas</a></td></tr>", $row[0], $row[1], $row[2], $row[3]);
            }
        ?>
    </table>
    <form class="form-inline add-form" action="addProgram.php" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Enter Program Name" required>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" name="release" placeholder="Enter Release" required>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" name="version" placeholder="Enter Version" required>
      </div>
      <button type="submit" class="btn btn-default">Add Program</button>
    </form>
    <a href="databaseMaintenance.php" class="btn btn-default">Back</a>
</div>

</body>
</html>
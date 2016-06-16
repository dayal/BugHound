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
    <h1>Employees</h1>
    <table class="table">
        <tr>
            <th>Username</th>       
            <th>Name</th>
            <th>Admin</th>
            <th></th>
        </tr>  
        <?php
            $db = mysql_connect("localhost", "root");
            mysql_select_db("bug_hound",$db);
            $sql = "SELECT username, name, IF(is_admin, 'True', 'False') FROM employee";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_row($result)) {
                printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0], $row[1], $row[2]);
            }
        ?>
    </table>
    <form class="form-inline add-form" action="addEmployee.php" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required>
      </div>
      <div class="form-group">
        <label for="isAdmin" style="margin-right:5px">Admin?</label>
        <input type="hidden" name="isAdmin" value="0" />
        <input type="checkbox" class="form-control" name="isAdmin" id="isAdmin" value="1">
      </div>
      <button type="submit" class="btn btn-default">Add Employee</button>
    </form>
    <a href="databaseMaintenance.php" class="btn btn-default">Back</a>
</div>

</body>
</html>
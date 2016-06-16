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
    <h1>Areas</h1>
    <?php
        $db = mysql_connect("localhost", "root");
        mysql_select_db("bug_hound",$db);
        $sql = "SELECT id, name FROM area WHERE program_id = " . $_GET['program_id'];;
        $result = mysql_query($sql);
        while ($row = mysql_fetch_row($result)) {
            echo "<form class='form-inline' action='updateArea.php' method='POST'>";
            echo "<div class='form-group'><label>Area Name</label>";
            echo "<input type='text' class='form-control' name='name' value='" . $row[1] . "' required></div>";
            echo "<button type='submit' class='btn btn-default'>Update Area</button>";
            echo "<input type='hidden' name='id' value='" . $row[0] . "'>";
            echo "<input type='hidden' name='program_id' value=" . $_GET['program_id'] . ">";
            echo "</form>";
        }
    ?>
    <form class="form-inline add-form" action="addArea.php" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Enter Area" required>
    </div>
    <button type="submit" class="btn btn-default">Add New Area</button>
    <?php
        echo "<input type='hidden' name='program_id' value='" . $_GET['program_id'] . "'>";
    ?>
    </form>
    <a href="program.php" class="btn btn-default">Back</a>

    
</div>

</body>
</html>
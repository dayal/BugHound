<?php
   $db = mysql_connect("localhost", "root");
   mysql_select_db("bug_hound", $db);
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $sql = "SELECT is_admin FROM employee WHERE username = '$_POST[username]' and password = '$_POST[password]'";
      $result = mysql_query($sql);
      $row = mysql_fetch_row($result);
              
      if(!empty($row)) {
         $_SESSION['user'] = '$_POST[username]';
         $_SESSION['isAdmin'] = $row[0];
         header("location:index.php");
      } else {
         echo "<script>alert('Invalid login credentials')</script>";
      }
   }
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
   <h1>Login</h1>

   <form action="" class="form-horizontal" method="POST">
      <div class="form-group">
         <label class="col-sm-2 control-label">UserName</label>
         <div class="col-sm-4">
            <input class="form-control" type="text" name="username" required/>
         </div>
      </div>
      <div class="form-group">
         <label class="col-sm-2 control-label">Password</label>
         <div class="col-sm-4">
            <input class="form-control" type="password" name="password" required/>
         </div>
      </div>
      <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-default">Submit</button>
         </div>
      </div>
   </form>
</div>
</body>
</html>


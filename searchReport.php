<?php
   error_reporting(0);
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <h1>Bug Report Search</h1>
  <form action="searchResult.php" class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="col-sm-2 control-label">Program</label>
      <div class="col-sm-4">
          <select class="form-control" name="programId" id="program-select">
            <option disabled selected value>Select a program</option>
            <?php
                $db = mysql_connect("localhost", "root");
                mysql_select_db("bug_hound",$db);
                $sql = "SELECT id, name, rel, version FROM program";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_row($result)) {
                    echo "<option value=" . $row[0] . ">" . $row[1] . " V" . $row[2] . "." . $row[3];
                }
            ?>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Report Type</label>
      <div class="col-sm-4">
          <select class="form-control" name="reportType" id="report-type">
            <option>Coding Error</option>
            <option>Design Issue</option>
            <option>Suggestion</option>
            <option>Documentation</option>
            <option>Hardware</option>
            <option>Query</option>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Severity</label>
      <div class="col-sm-4">
          <select class="form-control" name="severity" id="severity">
            <option>Minor</option>
            <option>Serious</option>
            <option>Fatal</option>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Reported By</label>
      <div class="col-sm-4">
          <select class="form-control" name="reportedById" id="reported-by">
          <?php
              $db = mysql_connect("localhost", "root");
              mysql_select_db("bug_hound",$db);
              $sql = "SELECT id, name FROM employee";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_row($result)) {
                  echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
              }
          ?>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Report Date</label>
      <div class="col-sm-4">
          <input class="form-control" type="date" name="reportedDate"/>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Functional Area</label>
      <div class="col-sm-4">
          <select class="form-control" name="area" id="functional-area">
          <?php
              $db = mysql_connect("localhost", "root");
              mysql_select_db("bug_hound",$db);
              $sql = "SELECT name FROM area WHERE program_id=" . $_GET['program_id'];
              $result = mysql_query($sql);
              while ($row = mysql_fetch_row($result)) {
                  echo "<option>" . $row[0] . "</option>";
              }
          ?>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Assigned To</label>
      <div class="col-sm-4">
          <select class="form-control" name="assignedToId" id="assigned-to">
          <?php
              $db = mysql_connect("localhost", "root");
              mysql_select_db("bug_hound",$db);
              $sql = "SELECT id, name FROM employee";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_row($result)) {
                  echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
              }
          ?>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Status</label>
      <div class="col-sm-4">
          <select class="form-control" name="status" id="status">
            <option>Open</option>
            <option>Closed</option>
            <option>Resolved</option>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Priority</label>
      <div class="col-sm-4">
          <select class="form-control" name="priority" id="priority">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Resolution</label>
      <div class="col-sm-4">
          <select class="form-control" name="resolution" id="resolution">
            <option>Pending</option>
            <option>Fixed</option>
            <option>Irreproducible</option>
            <option>Deferred</option>
            <option>As Designed</option>
            <option>Withdrawn by Reporter</option>
            <option>Need More Information</option>
            <option>Disagree With Suggestion</option>
            <option>Duplicate</option>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Resolved By</label>
      <div class="col-sm-4">
          <select class="form-control" name="resolvedById" id="resolved-by">
          <?php
              $db = mysql_connect("localhost", "root");
              mysql_select_db("bug_hound",$db);
              $sql = "SELECT id, name FROM employee";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_row($result)) {
                  echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
              }
          ?>
          </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Search</button>
        <a href="#" class="btn btn-default" onClick="resetFields();">Reset<a>
        <a href="index.php" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </form>
</div>

</body>

<script>

  $(document).ready(function(){
    resetFields();
    $('#program-select').change(function() {
      window.location = "searchReport.php?program_id=" + $(this).val();
    });

    <?php
        if (!empty($_GET['program_id'])) {
          echo "$('#program-select').val(" . $_GET['program_id'] .")";
        }
    ?>
  });

  function resetFields() {
    $("#report-type").prop("selectedIndex", -1);
    $("#severity").prop("selectedIndex", -1);
    $("#functional-area").prop("selectedIndex", -1);
    $("#assigned-to").prop("selectedIndex", -1);
    $("#status").prop("selectedIndex", -1);
    $("#priority").prop("selectedIndex", -1);
    $("#resolution").prop("selectedIndex", -1);
    $("#reported-by").prop("selectedIndex", -1);
    $("#resolved-by").prop("selectedIndex", -1);
  };
</script>
</html>
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
  <h1>View Bug Report</h1>
  <form action="updateReport.php" class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="col-sm-2 control-label">Program<span class="required-field">*</span></label>
      <div class="col-sm-4">
          <select class="form-control" name="programId" id="program-select" required disabled>
            <?php
                $db = mysql_connect("localhost", "root");
                mysql_select_db("bug_hound",$db);
                $sql = "SELECT id, name, rel, version FROM program WHERE (select program_id FROM bug_report where id = '$_GET[report_id]')";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_row($result)) {
                    echo "<option value=" . $row[0] . ">" . $row[1] . " V" . $row[2] . "." . $row[3];
                }
            ?>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Report Type<span class="required-field">*</span></label>
      <div class="col-sm-4">
          <select class="form-control" name="reportType" id="report-type" required>
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
      <label class="col-sm-2 control-label">Severity<span class="required-field">*</span></label>
      <div class="col-sm-4">
          <select class="form-control" name="severity" id="severity" required>
            <option>Minor</option>
            <option>Serious</option>
            <option>Fatal</option>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Problem Summary<span class="required-field">*</span></label>
      <div class="col-sm-10">
          <textarea class="form-control" name="summary" rows="1" id="summary" required></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Reproducible?<span class="required-field">*</span></label>
      <div class="col-sm-10">
          <input type="hidden" name="reproducible" value="0"/>
          <input type="checkbox" style="margin-top:11px" name="reproducible" id="reproducible" value="1"/>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Problem<span class="required-field">*</span></label>
      <div class="col-sm-10">
          <textarea class="form-control" name="problem" rows="5" id="problem" required></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Suggested Fix</label>
      <div class="col-sm-10">
          <textarea class="form-control" name="suggestedFix" rows="5" id="suggested-fix"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Reported By<span class="required-field">*</span></label>
      <div class="col-sm-4">
          <select class="form-control" name="reportedById" id="reported-by" required disabled>
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
      <label class="col-sm-2 control-label">Report Date<span class="required-field">*</span></label>
      <div class="col-sm-4">
          <input class="form-control" type="date" name="reportDate" id="report-date" required disabled/>
      </div>
    </div>
 
    <hr>

    <div class="form-group">
      <label class="col-sm-2 control-label">Functional Area</label>
      <div class="col-sm-4">
          <select class="form-control" name="area" id="functional-area">
          <?php
              $db = mysql_connect("localhost", "root");
              mysql_select_db("bug_hound",$db);
              $sql = "SELECT name FROM area WHERE (select program_id FROM bug_report where id = '$_GET[report_id]')";
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
      <label class="col-sm-2 control-label">Comments</label>
      <div class="col-sm-10">
          <textarea class="form-control" name="comments" rows="5"></textarea>
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
      <label class="col-sm-2 control-label">Resolution Date</label>
      <div class="col-sm-4">
          <input class="form-control" type="date" name="resolutionDate"/>
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
      <label class="col-sm-2 control-label">Resolution Version</label>
      <div class="col-sm-4">
          <input class="form-control" type="text" name="resolutionVersion" id="resolution-version" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Attachment</label>
      <div class="col-sm-4">
          <?php
            $dir = "uploads/" . $_GET[report_id] . "/";
            if ($dh = opendir($dir)) {
              while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != "..") {
                  echo "<a href='" . $dir . $file . "' download>Download Attachment</a>";
                }
              }
              closedir($dh);
            }
          ?>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="searchReport.php" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </form>
</div>

</body>
<script>
  $(document).ready(function(){

    <?php
      $db = mysql_connect("localhost", "root");
      mysql_select_db("bug_hound",$db);
      $sql = "select reported_by_id, assigned_to_id, resolved_by_id, report_type, severity, status, priority, resolution, report_date, summary, problem, suggested_fix, comments, resolution_version, area, is_reproducible FROM bug_report where id = '$_GET[report_id]'";
      $result = mysql_query($sql);
      while ($row = mysql_fetch_row($result)) {
          echo "$('#reported-by').val(" . $row[0] .");\n";
          echo "$('#assigned-to').val(" . $row[1] .");\n";
          echo "$('#resolved-by').val(" . $row[2] .");\n";
          echo "$('#report-type').val('" . $row[3] ."');\n";
          echo "$('#severity').val('" . $row[4] ."');\n";
          echo "$('#status').val('" . $row[5] ."');\n";
          echo "$('#priority').val(" . $row[6] .");\n";
          echo "$('#resolution').val('" . $row[7] ."');\n";
          echo "$('#report-date').val('" . $row[8] ."');\n";
          echo "$('#summary').val('" . $row[9] ."');\n";
          echo "$('#problem').val('" . $row[10] ."');\n";
          echo "$('#suggested-fix').val('" . $row[11] ."');\n";
          echo "$('#comments').val('" . $row[12] ."');\n";
          echo "$('#resolution-version').val('" . $row[13] ."');\n";
          echo "$('#functional-area').val('" . $row[14] ."');\n";
          echo "$('#reproducible').val(" . $row[15] .");\n";
      }
    ?>
  });

  $("form").submit(function(event) {
    if ($("#problem").val().replace(/\s/g, '') == "") {
      alert("Problem field is required.");
      event.preventDefault();
    }

    if ($("#summary").val().replace(/\s/g, '') == "") {
      alert("Problem Summary field is required.");
      event.preventDefault();
    }
  });
</script>
</html>
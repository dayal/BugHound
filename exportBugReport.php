<?php
   error_reporting(0);
   include('session.php');
   if (!$_SESSION['isAdmin']) {
       header("location:login.php");         
   }
?>

<?php
    // connect to your database
    $db = mysql_connect("localhost", "root");
    mysql_select_db("bug_hound", $db);
    // run query to select everything
    $sel = mysql_query("SELECT * FROM bug_report");
    
    $filecsv = fopen('bugReport.csv', 'w');
    $filexml = fopen('bugReport.xml', 'w');
    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><bugReports>";
    while ($row = mysql_fetch_assoc($sel)) {
        fputcsv($filecsv, $row);
        $xml .= "<bugReport>";
        foreach($row as $key => $value) {
            $xml .= "<$key><![CDATA[$value]]></$key>";
        }
        $xml .= "</bugReport>";
    }
    $xml .= "</bugReports>";
    fwrite($filexml, $xml);
    fclose($filecsv);
    fclose($filexml);

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
    <h1>Export BugReport Table</h1>
    
    <form class="form-inline add-form">
      <div class="form-group">
        <label style="margin-right:20px">Export Format</label>
        <label class="radio-inline">
          <input type="radio" name="format" id="ascii" value="ascii"> ASCII
        </label>
        <label class="radio-inline">
          <input type="radio" name="format" id="xml" value="xml"> XML
        </label>
      </div>
      <button type="submit" class="btn btn-default">Export</button>
    </form>
</div>

<script>
  $("form").submit(function(event) {
    event.preventDefault();
    if ($('#ascii').prop('checked')) {
        window.location.href = 'bugReport.csv';
    }
    if ($('#xml').prop('checked')) {
        window.location.href = 'bugReport.xml';
    }

  });
</script>

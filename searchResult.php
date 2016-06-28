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
    <h1>Bug Report Search Results</h1>
    <table class="table">
        <tr>
            <th>Report Id</th>       
            <th>Report Date</th>
            <th>Functional Area</th>
            <th></th>
        </tr>  

        <?php
            $db = mysql_connect("localhost", "root");
            mysql_select_db("bug_hound", $db);
            $sql = "SELECT id, report_date, area FROM bug_report WHERE";

            if (!empty($_POST['programId'])) {
                $sql = $sql . " program_id = '" . $_POST['programId'] . "' AND";
            }

            if (!empty($_POST['reportType'])) {
                $sql = $sql . " report_type = '" . $_POST['reportType'] . "' AND";
            }

            if (!empty($_POST['severity'])) {
                $sql = $sql . " severity = '" . $_POST['severity'] . "' AND";
            }

            if (!empty($_POST['reportedById'])) {
                $sql = $sql . " reported_by_id = " . $_POST['reportedById'] . " AND";
            }

            if (!empty($_POST['reportDate'])) {
                $sql = $sql . " report_date = " . $_POST['reportDate'] . " AND";
            }

            if (!empty($_POST['area'])) {
                $sql = $sql . " area = '" . $_POST['area'] . "' AND";
            }

            if (!empty($_POST['assignedToId'])) {
                $sql = $sql . " assigned_to_id = " . $_POST['assignedToId'] . " AND";
            }

            if (!empty($_POST['status'])) {
                $sql = $sql . " status = '" . $_POST['status'] . "' AND";
            }

            if (!empty($_POST['priority'])) {
                $sql = $sql . " priority = '" . $_POST['priority'] . "' AND";
            }

            if (!empty($_POST['resolution'])) {
                $sql = $sql . " resolution = '" . $_POST['resolution'] . "' AND";
            }

            if (!empty($_POST['resolvedById'])) {
                $sql = $sql . " resolved_by_id = " . $_POST['resolvedById'] . " AND";
            }

            $sql = $sql . " 1 = 1";


            $result = mysql_query($sql);
            echo mysql_error($db) . "\n";

            while ($row = mysql_fetch_row($result)) {
                printf("<tr><td>%s</td><td>%s</td><td>%s</td><td><a href='viewReport.php?report_id=%s'>View/Update Report</a></td></tr>", $row[0], $row[1], $row[2], $row[0]);
            }
        ?>

    </table>
    
    <a href="searchReport.php" class="btn btn-default">Back</a>
</div>

</body>
</html>

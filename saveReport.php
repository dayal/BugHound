<?php
   error_reporting(0);
   include('session.php');
?>

<?php
    $db = mysql_connect("localhost", "root");
    mysql_select_db("bug_hound", $db);
    $sql = "INSERT INTO bug_report (program_id, reported_by_id, assigned_to_id, resolved_by_id, report_type, severity, status, priority, resolution, report_date, summary, problem, suggested_fix, comments, resolution_version, area, is_reproducible) VALUES ('$_POST[programId]', '$_POST[reportedById]', '$_POST[assignedToId]', '$_POST[resolvedById]', '$_POST[reportType]', '$_POST[severity]', '$_POST[status]', '$_POST[priority]', '$_POST[resolution]', '$_POST[reportDate]', '$_POST[summary]', '$_POST[problem]', '$_POST[suggestedFix]', '$_POST[comments]', '$_POST[resolutionVersion]', '$_POST[area]', '$_POST[reproducible]')";
    $result = mysql_query($sql);
    echo mysql_error($db) . "\n";

    include 'index.php';
?>

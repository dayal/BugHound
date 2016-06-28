<?php
   error_reporting(0);
   include('session.php');
?>

<?php
    $db = mysql_connect("localhost", "root");
    mysql_select_db("bug_hound", $db);
    $sql = "UPDATE bug_report SET assigned_to_id = '$_POST[assignedToId]', resolved_by_id = '$_POST[resolvedById]', report_type = '$_POST[reportType]', severity = '$_POST[severity]', status = '$_POST[status]', priority = '$_POST[priority]', resolution = '$_POST[resolution]', summary = '$_POST[summary]', problem = '$_POST[problem]', suggested_fix = '$_POST[suggestedFix]', comments = '$_POST[comments]', resolution_version = '$_POST[resolutionVersion]', area = '$_POST[area]', is_reproducible = '$_POST[reproducible]'";
    $result = mysql_query($sql);
    echo mysql_error($db) . "\n";

    include 'index.php';
?>

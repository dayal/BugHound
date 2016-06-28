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

    $last_id = mysql_insert_id($db);
    if(isset($_FILES['attachment'])) {
        if ( !is_dir("uploads/" . $last_id . "/")) {
            mkdir("uploads/" . $last_id . "/");
        }
        move_uploaded_file($_FILES['attachment']['tmp_name'], "uploads/" . $last_id . "/" . $_FILES['attachment']['name']);
    }
    include 'index.php';
?>

<?php
    include("connection.php");
    error_reporting();
    $R = $_GET['rn'];
    $query = "delete from student_details where roll_no = '$R'";
    $data = mysqli_query($conn, $query);

    if($data)
    {
        // echo "<script>alert('Record Deleted')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT = "0; URL=http://localhost/College/view_data.php">
        <?php
    }
    else
    {
        echo "<script>alert('Record Not Deleted')</script>";
    }
?>
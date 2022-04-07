<?php
include("connection.php");
error_reporting(0);
    if(isset($_GET['submit']))
    {
        $ROLLNO = $_GET["clg_rollno"];
        $NAME = $_GET["clg_name"];
        $STREAM = $_GET["clg_stream"];

        $errors =  array();

        // $r = "select roll_no from student_details where roll_no = '$ROLLNO'";
        // $rr = mysqli_query($conn,$r);

            if(empty($ROLLNO))
            {
                $errors['r'] = "Note: Roll Number Requires";
            }
            // else if(mysqli_num_rows($rr) > 0)
            // {
            //     $errors['r'] = "Note: Roll Number Already Exist";
            // }

            if(empty($NAME))
            {
                $errors['n'] = "Note: Name Requires";
            }

            if(empty($STREAM))
            {
                $errors['s'] = "Note: Stream Requires";
            }

            if(count($errors) == 0)
            {
                $query = "update student_details set names='$NAME', stream='$STREAM' where roll_no = '$ROLLNO'";
                $update = mysqli_query($conn, $query);

                if($update)
                {
                    echo "<script>alert('Update Done')</script>";
                }
                else
                { 
                    echo "<script>alert('Update Failed')</script>";
                }
            }
    }
?>

<html>
    <head>
        <title>College Student Data</title>
    </head>
    <body>
        <center>
            <br><br>
            <form action = "" method = "GET">
                Roll No. : <input type="text" id="clg_rollno" name="clg_rollno" value= <?php echo $_GET['rn']?>>
                <br><br>
                Name : <input type="text" id="clg_name" name="clg_name" value= <?php echo $_GET['n']?>>
                <br><br>
                Stream : <input type="text" id="clg_stream" name="clg_stream" value= <?php echo $_GET['s']?>>
                <br><br>
                <input type="submit" name="submit" value="Update" />
                <br><br>
                <p> <?php 
                    if(isset($errors['r'])) echo $errors['r'];
                ?> </p>
                <p> <?php 
                    if(isset($errors['n'])) echo $errors['n'];
                ?> </p>
                <p> <?php 
                    if(isset($errors['s'])) echo $errors['s'];
                ?> </p>
            </form>
        </center>

    </body>
</html>
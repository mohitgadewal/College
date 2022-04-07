<?php
include("connection.php");
error_reporting(0);
    if(isset($_POST['submit']))
    {
        $ROLLNO = $_POST["clg_rollno"];
        $NAME = $_POST["clg_name"];
        $STREAM = $_POST["clg_stream"];

        $errors =  array();

        $r = "select roll_no from student_details where roll_no = '$ROLLNO'";
        $rr = mysqli_query($conn,$r);

            if(empty($ROLLNO))
            {
                $errors['r'] = "Note: Roll Number Requires";
            }
            else if(mysqli_num_rows($rr) > 0)
            {
                $errors['r'] = "Note: Roll Number Already Exist";
            }

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
                $query = "insert into student_details(roll_no,names,stream) values('$ROLLNO','$NAME','$STREAM')";
                $result = mysqli_query($conn, $query);

                if($result)
                {
                    echo "<script>alert('Done')</script>";
                }
                else
                {
                    echo "<script>alert('Failed')</script>";
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
            <h1>Register Your Record</h1>
            <br><br>
            <form action = "" method = "POST">
                Roll No. : <input type="text" id="clg_rollno" name="clg_rollno" />
                <br><br>
                Name : <input type="text" id="clg_name" name="clg_name" />
                <br><br>
                Stream : <input type="text" id="clg_stream" name="clg_stream" />
                <br><br>
                <input type="submit" name="submit" value="Register" />
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
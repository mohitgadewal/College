<style>
    td{
        padding: 10px;
    }
</style>
<?php
    include("connection.php");
    error_reporting(0);

    $query = "select * from student_details";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    


    if($total != 0)
    {
        ?>

        <center><table>
        <tr>
            <th>Roll No</th>
            <th>Names</th>
            <th>Streams</th>
            <th colspan="2">Operations</th>
        </tr>
        
        
        <?php
        
        while($result = mysqli_fetch_assoc($data))
        {
            echo "
                <tr>
                    <td>".$result['roll_no']."</td>
                    <td>".$result['names']."</td>
                    <td>".$result['stream']."</td>
                    <td><a href='update.php?rn=$result[roll_no]&n=$result[names]&s=$result[stream]'>Edit</a></td>
                    <td><a href='delete.php?rn=$result[roll_no]' onclick = 'return checkdelete()'>Delete</a></td>
                </tr>";
        }
    }
    else
    {
        echo "No Records";
    }
?>
</table>
</center>
<script>
    function checkdelete()
    {
        return confirm("Are You Sure You Want To Delete Record");
    }
</script>
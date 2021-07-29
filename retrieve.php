<?php 

include_once 'dbconnect.php';

$user_name = $_POST['USERNAME'];
$password = $_POST['PASSWORD'];
    



$result = mysqli_query($con, "select * from users");

?>

<!DOCTYPE html>
<html>
    <head>
    <title> RETRIEVE DATA</title>
    </head>

    <body>
    <?php
    // check if data exists
    if (mysqli_num_rows($result)> 0){

    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>USERID</td>
            <td>USERNAME</td>
            <td>PASSWORD</td>  
            <td>GENDER</td>
            <td>PROFESSION</td>
        </tr>

            <?php
            $r = 0;
            //print all row data
            while ($row = mysqli_fetch_array($result)) {
            ?>
        <tr>
            <td><?php echo $row["ID"]?></td>
            <td><?php echo $row["USERID"]?></td>
            <td><?php echo $row["USERNAME"]?></td>
            <td><?php echo $row["PASSWORD"]?></td>
            <td><?php echo $row["GENDER"]?></td>
            <td><?php echo $row["PROFESSION"]?></td>
        </tr>

            <?php 
            $r++;
            }
            ?>

    </table>
    <?php
    }
    else{
        echo " ";

    }
    ?>

    </body>

</html>
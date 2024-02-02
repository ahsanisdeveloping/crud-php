<?php
    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "ahsan");
    if($conn->connect_error)
    {
        echo "there was an error" . "<br>";
    }
    else
    {
        $query = "DELETE FROM teachers WHERE id='$id'";
        if($conn->query($query))
        {
            echo "row deleted successfully" . "<br>";
        }
        else
        {
            echo "there was an error" . "<br>";
        }
        
    }
    ?>
    <html>
        <div><button><a href="modify.php">Back</a></button></div>
    </html>

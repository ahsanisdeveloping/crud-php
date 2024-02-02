<?php
    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "ahsan");
    if($conn->connect_error)
    {
        echo "there was an error" . "<br>";
    }
    else
    {
        $query = "SELECT * FROM teachers WHERE id='$id'";
        $result = $conn->query($query);
        if($result->num_rows>0)
        {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        else
        {
            echo "no data found" . "<br>";
        }
    }
    if(isset($_POST['edit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $scale = $_POST['scale'];
        $query = "UPDATE teachers SET name = '$name', email='$email', password = '$password', scale = '$scale' WHERE id='$id'";
        if($conn->query($query)===TRUE)
        {
            echo "row updated successfully" . "<br>";
        }
        else
        {
            echo "there was an error :" . $conn->error;
        }
    }
?>
<html>
    <head>
        <style>
            @font-face {
                font-family: myFont;
                src: url('fonts/anchor.ttf');
            }
            html{
                background-image:url("images/background.jpg");
                background-size:cover;
                background-position:center;
                background-repeat:no-repeat;
                font-family:myFont;
            }   
            #main{
                background-color:purple;
                border-radius:30px;
                width:1200px;
                margin:0.5% auto;
                padding:20px;
            }
            h1,label,table{
                color:white;
            }
            h1{
                text-align:center;
                font-size:2.5rem;
            }
            table{
                border-color:white;
                font-size:1.5rem;
                margin:0px auto;
            }
            button{
                padding:0.8rem;
                border-radius:10px;
                border-style:none;
                background-color:#F7F7F7;
                transition:all 300ms ease;
                font-family:myFont;
                font-weight:bold;
            }
            button:hover{
                color:purple;
                cursor:pointer;
                background-color:white;
            }input{
                border:none;
                border-radius:5px;
                width:300px;
                height:30px;
                margin-left:10px;
            }
            label{
                position:relative;
                font-size:1.5rem;
                margin-left:70px;
                top:5px;
            }
            form{
                display:flex;
                flex-direction:column;
                justify-content:center;
            }
            form div{
                margin:10px;
            }
            input{
                float:right;
                position:relative;  
            }
            #edit-btn{
                width:100px;
            }
        </style>
    </head>
    <body>
        <div id="main">
        <div id="left">
        <h1>I am Edit</h1>
        <table border="1px">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Scale</th>
                <th>Created_at</th>
            </tr>
            <?php foreach($data as $row):?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['scale']?></td>
                <td><?php echo $row['created_at']?></td>
            </tr>
            <?php endforeach;?>
        </table>
        </div>
        <div id="right">
        <h1>Enter New info</h1>
        <form action="" method="POST">
            <div><label>Name:</label><input type="text" name="name"></div>
            <div><label>Email:</label><input type="text" name="email"></div>
            <div><label>Password:</label><input type="password" name="password"></div>
            <div><label>Scale:</label><input type="number" name="scale"></div>
            <button type="submit" name="edit" id="edit-btn">Edit</button>
            </form>
        </div>
        <div><button><a href="modify.php">Back</a></button></div>
        </div>
    </body>
</html>

<input type="text" value="">
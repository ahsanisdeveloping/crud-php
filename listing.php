<?php
    $conn = new mysqli("localhost", "root", "", "ahsan");
    if($conn->connect_error)
    {
        echo "there was an error" . "<br>";
    }
    else
    {
        $query = "SELECT * FROM teachers ORDER BY id DESC";
        $result = $conn->query($query);
        if($result->num_rows>0)
        {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        else
        {
            echo "no data found";
        }
    }
    if(isset($_POST['viewAll']))
    {
        $conn = new mysqli("localhost", "root", "", "ahsan");
            if($conn->connect_error)
            {
                echo "there was an error" . "<br>";
            }
            else
            {
                $query = "SELECT * FROM teachers";
                $result = $conn->query($query);
                if($result->num_rows>0)
                {
                    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
                else
                {
                    echo "no data found";
                }
            }
    }
    if(isset($_POST['view']))
    {
        $id = $_POST['id'];
        if(empty($id))
        {
            echo "must enter an id" . "<br>";
        }
        else
        {
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
                    echo "no data found";
                }
            }
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
            }
            input{
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
            #viewAll{
                margin-left:70px;
                margin-bottom:20px;
                font-size:1.7rem;
            }
            #view{
                font-size:1.2rem;
                padding:4px 20px;
                position:relative;
                top:3px;
            }
            #main-btn{
                margin:10px 0px 10px 45%;
                font-size:1.7rem;
            }
            #main-btn a{
                text-decoration:none;
                color:black;
                transition:all 300ms ease;
            }
            #main-btn:hover a{
                color:purple;
            }
        </style>
    </head>
    <body>
    <div id="main">
    <div id="input">
    <h1>View Data</h1>
    <form action="" method="POST">
        <button name="viewAll" id="viewAll">View All</button>
        <br>
        <label>Enter teacher's ID:</label><input type="number" name="id">
        <button id="view" name="view">View</button>
    </form>
    </div>
    <div id="output">
        <h1>Output</h1>
        <table border="1px">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Scale</th>
                <th>Created_at</th>
            </tr>
            <?php 
            if(isset($data))
            {
            foreach($data as $row):?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['scale']?></td>
                <td><?php echo $row['created_at']?></td>
            </tr>
            <?php endforeach;}?>
        </table>
    </div>
    <button id="main-btn"><a href="crud.php">Main</a></button>
    </div>
    </body>
</html>
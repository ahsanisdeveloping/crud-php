<?php
    if(isset($_POST['submit']))
    {
        $count = 0;
        foreach($_POST as $key => $value)
        {
            if($value == '' && $key <> 'submit')
            {
                echo "Please enter some value in $key field" . "<br>";
                $count++;
            }
        }
        if($count>0)
        {
            echo "All fields must be filled" . "<br>";
        }
        else
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $scale = $_POST['scale'];
            $conn = new mysqli("localhost", "root", "", "ahsan");
            if($conn->connect_error)
            {
                echo "there was an error:" . $conn->error . "<br>";
            }
            else
            {
                $query = "INSERT INTO teachers (name,email,password,scale)VALUES ('$name','$email','$password','$scale')";
                if($conn->query($query))
                {
                    echo "Row inserted successfully" . "<br>";
                    header("location:listing.php");
                }
                else
                {
                    echo "there was an error" . $conn->error . "<br>";
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
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                margin:5% auto;
                width:50%;
                padding:2% 1%;
                border-radius:15px;
            }
            #form{
                position:relative;
                width:500px;
                display:flex;
                flex-direction:column;
                justify-content:space-evenly;
            }
            #form div{
                margin:10px;
            }
            h1{
                color:white;
                font-size:3rem;
            }
            label{
                color:white;
                font-size:1.7rem;
            }
            input{
                border:none;
                border-radius:5px;
                width:300px;
                height:30px;
                float:right;
                margin-right:50px;
            }
            button{
                padding:0.8rem;
                border-radius:15px;
                border-style:none;
                margin:2px 200px;
                background-color:#F7F7F7;
                transition:all 300ms ease;
                font-family:myFont;
                font-weight:bold;
                font-size:1.3rem;
            }
            button:hover{
                background-color:lightgrey;
                color:purple;
                cursor:pointer;
            }
            #back{
                position:relative;
                left:-200px;
            }
            #back a{
                text-decoration:none;
                color:purple;
            }
        </style>
    </head>
    <body>
    <div id="main">
    <h1>Teachers Form</h1>
    <div id="form">
    <form action="" method="POST">
    <div><label>Name:</label><input type="text" name="name"></div>
    <div><label>Email:</label><input type="text" name="email"></div>
    <div><label>Password:</label><input type="password" name="password"></div>
    <div><label>Scale:</label><input type="number" name="scale"></div>
    <div><button type="submit" name="submit">Insert</button></div>
    </form>
    </div>
    <button id="back"><a href="crud.php">Back</a></button>
    </div>
    </body>
    </html>
<html>
    <head>
        <title>HOME</title>
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
            h1{
                font-size:3rem;
                color:white;
            }
            #main{
                border-radius:30px;
                box-shadow:black 1px 1px 1px;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                background-color:purple;
                padding:3% 0%;
                width:70%;
                margin:10% auto;
            }
            a{
                text-decoration:none;
                font-family:myFont;
                font-weight:bold;
                font-size:2rem;
            }
            button{
                padding:1rem;
                border-radius:15px;
                border-style:none;
                margin:2px;
                background-color:#F7F7F7;
                transition:all 300ms ease;
            }
            button:hover{
                background-color:lightgrey;
                color:white;
            }
            button:hover a{
                color:black;
            }
            p{
                font-size:2rem;
                margin-top:-2%;
                color:white;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <h1>Welcome!</h1>
            <p>What would you like to do?</p>
            <div id="btn-div">
                <button><a href="insertion.php">Insert Data</a></button>
                <button><a href="listing.php">View Data</a></button>
                <button><a href="modify.php">Modify Data</a></button>
            </div>
        </div>
    </body>
</html>
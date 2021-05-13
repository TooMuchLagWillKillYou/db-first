<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>db-first</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: sans-serif;
        }

        .container{
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;

            height: 100vh;
            padding: 5%;
            background-color: BlanchedAlmond;
        }

        a{
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <div class="container">

        <?php

            require_once "data.php";

            $conn = getConnection();
            $sql = getStanze();
            
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
            $stmt -> bind_result($id, $room_number);

            while ($stmt -> fetch()) {

                echo '<a href="stanze.php?id=' . $id . '">' . $room_number . '</a>' . '<br>';
            }

            closeConn($conn, $stmt);

        ?> 
        
    </div>
</html>
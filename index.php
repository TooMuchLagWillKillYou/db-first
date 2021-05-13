<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>db-first</title>
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
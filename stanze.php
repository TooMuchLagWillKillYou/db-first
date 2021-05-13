<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stanze</title>

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
            justify-content: center;
            align-items: center;

            height: 100vh;
            padding: 5%;
            background-color: BlanchedAlmond;
        }

    </style>
</head>
<body>

    <div class="container">
    
        <?php

            require_once "data.php";
            $id = $_GET['id'];
            $conn = getConnection();
            $sql = getDetail();
            
            $stmt = $conn -> prepare($sql);
            $stmt -> bind_param('i', $id);
            $stmt -> execute();
            $stmt -> bind_result($floor, $beds);
            $stmt -> fetch();

            echo '<p>' . 'Piano: ' . $floor . '</p>' . '<p>' . 'Letti: ' . $beds . '</p>';
            closeConnection($conn, $stmt);
        ?>

    </div>

</body>
</html>
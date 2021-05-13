<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stanze</title>
</head>
<body>
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

        echo $floor . ' ' . $beds;
        closeConnection($conn, $stmt);
    ?>
</body>
</html>
<?php
    function getConnection( $servername = 'localhost',
                            $username = 'root',
                            $password = 'root',
                            $dbname = 'db-hotel') {
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn && $conn -> connect_error) {

            echo $conn -> connect_error;
        }

        return $conn;
    }

    function getStanze() {
        
        return
        "
            SELECT stanze.id, stanze.room_number
            FROM stanze
        ";
    }

    function getDetail() {

        return
        "
            SELECT stanze.floor, stanze.beds
            FROM stanze
            WHERE id = ?
        ";
    }

    function closeConnection($conn, $stmt) {

        $stmt -> close();
        $conn -> close();
    }
?>
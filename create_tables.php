<?php

    require_once ("settings.php");

    function check_table_exists($conn, $table_name) {
        $sql = "SELECT 1 FROM '{$table_name}' LIMIT 1";
        $result = @mysqli_query($conn, $sql);
        return $result;
    }

    function create_database($conn, $sql) {
        mysqli_query($conn, $sql);
    }

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);


    if ($conn->connect_error) {
        die(); //kill the script if there is a connection issue with the db
    }

    if (!check_table_exists($conn, "users")) {
        create_database($conn,
            "CREATE TABLE users (
                ID int NOT NULL AUTO_INCREMENT,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                PRIMARY KEY (ID)
            )
        ");
    }

    if (!check_table_exists($conn, "eoi")) {
        create_database($conn, 
            "CREATE TABLE eoi (
                EOInumber INT AUTO_INCREMENT PRIMARY KEY,
                jobRefNum CHAR(5) NOT NULL,
                firstName VARCHAR(20) NOT NULL,
                lastName VARCHAR(20) NOT NULL,
                address VARCHAR(255) NOT NULL,
                postcode INT(4) NOT NULL,
                email VARCHAR(255) NOT NULL,
                phone VARCHAR(12) NOT NULL,
                dob VARCHAR(255) NOT NULL,
                gender VARCHAR(255) NOT NULL,
                state VARCHAR(3) NOT NULL,
                skills VARCHAR(255) NOT NULL,
                otherSkills VARCHAR(1024) NOT NULL,
                status ENUM('New', 'Current', 'Final') DEFAULT 'New'
            )
        ");
    }
?>
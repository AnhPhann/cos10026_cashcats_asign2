<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Web Development">
<meta name="keyword" content="cos10026, web asign2, php, mysqli">
<meta name="author" content="Anh Phan, Hoa Thai Phat, Quinn Friend, Fletcher Scott">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="manage.css">
<link rel="icon" type="image/png" href="images/web-icon.png">

<?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>
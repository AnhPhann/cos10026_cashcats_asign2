<?php

if ($_SERVER["REQUEST_METHOD"] != "POST")
{
    header("Location: application.php");
    exit;
}

require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

function sanitize_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

function validate_input($data, $error) {

    if (isset($_POST[$data])) {
        if ($data == "skills") {
            $data = implode(",", $_POST[$data]);
        } else {
            $data = $_POST[$data];
        }
    } else {
        $data = "";
        if ($data != "otherskills" && $data != "skills") {
            $error .= "<p>{$data} is empty!</p>";
        }
    }
    
    switch ($data) {
        case "jobRefNum":
            if (strlen($data) !== 5) {
                $error .= "<p>Your Job Reference Number must be exactly 5 characters.</p>";
            }
            if (!preg_match('/^[a-zA-Z0-9]+$/', $data)) {
                $error .= "<p>Your Job Reference Number must be alphanumeric.</p>";    
            }
            break;
        case "firstName":
            if (strlen($data) > 20) {
                $error .= "<p>Your First Name must be less than 20 characters.</p>";
            }
            if (!preg_match('/^[a-zA-Z]+$/', $data)) {
                $error .= "<p>Your First Name must only contain letters.</p>";    
            }
            break;
        case "lastName":
            if (strlen($data) > 20) {
                $error .= "<p>Your Last Name must be less than 20 characters.</p>";
            }
            if (!preg_match('/^[a-zA-Z]+$/', $data)) {
                $error .= "<p>Your Last Name must only contain letters.</p>";    
            }
            break;
        case "address":
            if (strlen($data) > 40) {
                $error .= "<p>Your Address must be less than 40 characters.</p>";
            }
            break;
        case "postcode":
            if (strlen($data) !== 4) {
                $error .= "<p>Your Postcode must be exactly 4 characters.</p>";
            }
            if (!preg_match('/^[0-9]+$/', $data)) {
                $error .= "<p>Your Postcode must only contain numbers.</p>";
            }
            break;
        case "email":
            if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                $error .= "<p>Your email is invalid.</p>";
            }
            break;
        case "phone":
            if (strlen($data) > 12 || strlen($data) < 8) {
                $error .= "<p>Your Phone Number must be between 12 and 8 characters.</p>";
            }
            if (!preg_match('/^[0-9\s]+$/', $data)) {
                $error .= "<p>Your Phone Number must only contain numbers and spaces.</p>";
            }
            break;
        case "dob":
            list($dd,$mm,$yyyy) = explode('/',$data);
            if (!checkdate($mm,$dd,$yyyy)) {
                    $error .= "<p>Your Date of Birth is invalid.</p>";
            }
            break;
        case "gender":
            if (strlen($data) === 0) {
                $error .= "<p>Your gender must be selected</p>";
            }
            break;
        case "state":
            if (!in_array($data, array("VIC", "NSW", "QLD", "WA", "NT", "SA", "ACT", "TAS"))) {
                $error .= "<p>Your State is invalid.</p>";
            }
            break;
        case "skills":
            break;

        case "otherSkills":
            break;
    }
    
    return array($error, $data);
}

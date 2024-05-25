<?php

if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    header('location: application.php');
    exit;
} else {

    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        header("location: application.php");
        exit;
    }

    $error = "";

    // CREATE TABLE IF Table not exist
    $query = "CREATE TABLE IF NOT EXISTS eoi (
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
                status ENUM('New', 'Current', 'Final') DEFAULT 'New';
            );";

    // Sanitize and validate input fields
    list($error, $jobRefNum) = validate_input($conn, "jobRefNum", $error);
    list($error, $firstName) = validate_input($conn, "firstName", $error);
    list($error, $lastName) = validate_input($conn, "lastName", $error);
    list($error, $address) = validate_input($conn, "address", $error);
    list($error, $postcode) = validate_input($conn, "postcode", $error);
    list($error, $email) = validate_input($conn, "email", $error);
    list($error, $phone) = validate_input($conn, "phone", $error);
    list($error, $dob) = validate_input($conn, "dob", $error);
    list($error, $gender) = validate_input($conn, "gender", $error);
    list($error, $state) = validate_input($conn, "state", $error);
    list($error, $skills) = validate_input($conn, "skills", $error);
    list($error, $otherSkills) = validate_input($conn, "otherSkills", $error);
    $status = "New";

    // Check postcode matches state
    $error = validate_postcode($state, $postcode, $error);

    // Calculate age and validate
    $age = validate_age($dob);
    if ($age >= 80 || $age <= 15) {
        $error .= "<p>Your age is not appropriate.</p>";
    }

    // If no errors, insert EOI into database
    if (empty($error)) {
        $stmt = $conn->prepare('INSERT INTO eoi (jobRefNum, firstName, lastName, address, postcode, email, phone, dob, gender, state, skills, otherSkills, status)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssisssssiss', $jobRefNum, $firstName, $lastName, $address, $postcode, $email, $phone, $dob, $gender, $state, $skills, $otherSkills, $status);
        
        $conn->begin_transaction();
        $stmt->execute();
        $EOINum = $stmt->insert_id;
        $conn->commit();

        echo "<p>Your Expression of Interest Number is: {$EOINum}.</p>";
        $stmt->close();
    } else {
        echo $error;
    }

    mysqli_close($conn);
}

################################################  FUNCTIONS  ################################################
// Calculate age from date of birth
function validate_age($dob) {
    // Check if the date matches the format "dd/mm/yyyy"
    if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[1,2])\/(19|20)\d{2}$/', $dob))
    {
        return false;
    }
    
    $birthDate = DateTime::createFromFormat('d/m/Y', $dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthDate)->y;
    return ($age >= 15 && $age <= 80);
}

// Sanitize and validate input function
function validate_input($conn, $field, $error) {
    if (isset($_POST[$field])) { 
        if ($field == "skills") {
            $input = implode(",", $_POST[$field]);
        } else {
            $input = $_POST[$field];
        }
    } else {
        $input = "";
        if ($field != "otherSkills" && $field != "skills") {
            $error .= "<p>$field is required.</p>";
        }
    }
    
    $input = $conn->real_escape_string(trim($input));
    
    switch ($field) {
        case "jobRefNum":
            if (!preg_match('/^[a-zA-Z0-9]{5}$/', $input)) { 
                $error .= "<p>Job Reference Number must be 5 alphanumeric characters.</p>";
            }
            break;
        case "firstName":
            if (!preg_match('/^[a-zA-Z ]{1,20}$/', $input)) {
                $error .= "<p>First Name must contain only letters and spaces, max 20 characters.</p>";
            }
            break;
        case "lastName":
            if (!preg_match('/^[a-zA-Z ]{1,20}$/', $input)) {
                $error .= "<p>Last name must contain only letters and spaces, max 20 characters.</p>";
            }
            break;
        case "address":
            if (strlen($input) > 40) {
                $error .= "<p>Address must be less than 40 characters.</p>";
            }
            break;
        case "postcode":
            if (!preg_match('/^[0-9]{4}$/', $input)) {
                $error .= "<p>Postcode must be 4 digits.</p>";
            } 
            break;
        case "email":
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $error .= "<p>Email is invalid.</p>";
            }
            break;
        case "phone":
            if (!preg_match('/^[0-9 ]{8,12}$/', $input)) {
                $error .= "<p>Phone number must contain 8-12 digits and spaces.</p>";
            }
            break;
        case "dob":
            if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/', $input)) {
                $error .= "<p>Date of Birth must be a valid date in dd/mm/yyyy format.</p>";
            }
            break;
        case "gender":
            if ($input != "Male" && $input != "Female" && $input != "Other") {
                $error .= "<p>Please select a valid gender.</p>";
            }
            break;
        case "state":
            $states = ["VIC", "NSW", "QLD", "WA", "NT", "SA", "ACT", "TAS"];
            if (!in_array($input, $states)) {
                $error .= "<p>Please select a valid state.</p>";
            }
            break;
    }
    
    return array($error, $input);
}

// Validate postcode matches state
function validate_postcode($state, $postcode, $error) {
    switch ($state) {
        case "VIC":
            if (!preg_match('/^3[0-9]{3}$/', $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";
            }
            break;
        case "NSW":
            if (!preg_match('/^((2[0-5][0-9]{2})|(26[1-9][0-9]{2})|(2[7-8][0-9]{2})|(29[2-9][0-9]{2}))$/', $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";
            }
            break;
        case "QLD":
            if (!preg_match('/^4[0-9]{3}$/', $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";
            }
            break;
        case "NT":
            if (!preg_match("/^08[0-9]{2}$/", $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";;
            }
            break;
        case "WA":
            if (!preg_match('/^((66[0-9]{2})|(67[0-8][0-9])|(679[0-7]))$/', $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";
            }
            break;
        case "SA":
            if (!preg_match('/^5[0-7][0-9]{2}$/', $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";
            }
            break;
        case "TAS":
            if (!preg_match('/^7[0-7][0-9]{2}$/', $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";
            }
            break;
        case "ACT":
            if (!preg_match('/^((260[0-9])|(261[0-8]))$/', $postcode)) {
                $error .= "<p>Postcode does not match state selected.</p>";
            }
            break;
        }
        return $error;
    }
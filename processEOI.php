<?php

################################################  MAIN  ################################################
if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    header('location: application.php');
    exit();
}

require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die ("Database connection failed: " . mysqli_connect_error());
} else {
    // CREATE EOI TABLE if table not exist
    $query = "CREATE TABLE IF NOT EXISTS eoi (
        EOInumber INT AUTO_INCREMENT PRIMARY KEY,
        jobRefNum CHAR(5),
        firstName VARCHAR(20),
        lastName VARCHAR(20),
        dob DATE,
        gender ENUM('Male', 'Female', 'Other'),
        address VARCHAR(40),
        suburb VARCHAR(40),
        state VARCHAR(3),
        postcode CHAR(4),
        email VARCHAR(50),
        phone INT(12),
        HTML TINYINT(1),
        CSS TINYINT(1),
        JavaScript TINYINT(1),
        otherSkills TEXT,
        status ENUM('New', 'Current', 'Final') DEFAULT 'New'
    );";
    
    mysqli_query($conn, $query);
    require_once("processJOB.php");

    // Error handling for prepared statements
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Stores the errors:
    $errors = [];

    // ==  Validate each field on the from == //
    // Job Reference Number
    if (!isset($_POST["jobRefNum"])) {
        $errors[] = "<p>Job Reference Number is required!</p>";
    } else {
        if (!preg_match('/^[a-zA-Z0-9]{5}$/', $_POST["jobRefNum"])) { 
            $errors[] = "<p>Job Reference Number must be 5 alphanumeric characters.</p>";
        } else {
            $jobRefNum = sanitize_input($_POST["jobRefNum"], $conn);
        }
    }

    // First Name
    if (!isset($_POST["firstName"])) {
        $errors[] = "<p>First Name is required!</p>";
    } else {
        if (!preg_match('/^[a-zA-Z ]{1,20}$/', $_POST["firstName"])) { 
            $errors[] = "<p>Your First Name must contain only letters and spaces, max 20 characters.</p>";
        } else {
            $firstName = sanitize_input($_POST["firstName"], $conn);
        }
    }
    
    // Last Name
    if (!isset($_POST["lastName"])) {
        $errors[] = "<p>Your Last Name is required!</p>";
    } else {
        if (!preg_match('/^[a-zA-Z ]{1,20}$/', $_POST["lastName"])) { 
            $errors[] = "<p>Your last Name must contain only letters and spaces, max 20 characters.</p>";
        } else {
            $lastName = sanitize_input($_POST["lastName"], $conn);
        }
    }
        
    // Date Of Birth
    if (!isset($_POST["dob"])) {
        $errors[] = "<p>Date of Birth is required!</p>";
    } else {
        $dob = sanitize_input($_POST['dob'], $conn);
        $dob = new DateTime($dob);
        $currentDate = new DateTime();
        $age = $currentDate->diff($dob)->y;
        if ($age < 15 || $age > 80) {
            $errors[] = "<p>Date of Birth must be between 15 and 80 years.</p>";
        } else {
            $dob = $dob->format('Y-m-d'); 
        }
    }

    // Gender
    if (!isset($_POST["gender"])) {
        $errors[] = "<p>Gender is required.</p>";
    } else {
        if ($_POST["gender"]!= "Male" && $_POST["gender"]!= "Female" && $_POST["gender"]!= "Other") {
            $errors[] = "<p>Please select a valid gender.</p>";
        } else {
            $gender = sanitize_input($_POST["gender"], $conn);
        }
    }

    // Address
    if (!isset($_POST["address"])) {
        $errors[] = "<p>Address is required!</p>";
    } else {
        if (!preg_match('/^[a-zA-Z0-9 ]{1,40}$/', $_POST["address"])) {
            $errors[] = "<p>Address must be less than 40 characters.</p>";
        } else {
            $address = sanitize_input($_POST["address"], $conn);
        }
    }

    // Suburb
    if (!isset($_POST["suburb"])) {
        $errors[] = "<p>Suburb/Town is required!</p>";
    } else {
        if (!preg_match('/^[a-zA-Z0-9 ]{1,40}$/', $_POST["suburb"])) {
            $errors[] = "<p>Suburb/Town must be less than 40 characters.</p>";
        } else {
            $suburb = sanitize_input($_POST["suburb"], $conn);
        }
    }

    // State
    $valid_states = ["VIC", "NSW", "QLD", "WA", "NT", "SA", "ACT", "TAS"];
    if (!isset($_POST["state"]) || !in_array($_POST["state"], $valid_states)) {
        $errors[] = "<p>Please select a valid state.</p>";
    } else {
        $state = sanitize_input($_POST["state"], $conn);
    }

    // Postcode
    if (!isset($_POST["postcode"])) {
        $errors[] = "<p>Postcode is required!</p>";
    } else {
        if (!validate_postcode($state, $_POST["postcode"])) {
            $errors[] = "<p>Postcode does not match the selected state.</p>";
        } else {
            $postcode = sanitize_input($_POST["postcode"], $conn);
        }
    }

    // Email
    if (!isset($_POST["email"])) {
        $errors[] = "<p>Email is required!</p>";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "<p>Email is invalid.</p>";
        } else {
            $email = sanitize_input($_POST["email"], $conn);
        }
    }

    // Phone
    if (!isset($_POST["phone"])) {
        $errors[] = "<p>Phone Number is required!</p>";
    } else {
        if (!preg_match('/^[0-9 ]{8,12}$/', $_POST["phone"])) {
            $errors[] = "<p>Phone number must contain 8-12 digits and spaces.</p>";
        } else {
            $phone = sanitize_input($_POST["phone"], $conn);
        }
    }

    // Skills
    $HTML = isset($_POST["HTML"]) ? 1 : 0;
    $CSS = isset($_POST["CSS"]) ? 1 : 0;
    $JavaScript = isset($_POST["JavaScript"]) ? 1 : 0;

    // Other Skills
    if (isset($_POST["otherSkills"])) {
        $otherSkills = sanitize_input($_POST["otherSkills"], $conn);
    } else {
        $otherSkills = "";
    }

    // ==  Continue processing to the table if no errors == //
    if (empty($errors)) {
        // Make sure the ID is auto_increment although one of the ID was deleted
        $eoi_query = "SELECT MAX(EOInumber) AS new_id FROM eoi";
        $result = mysqli_query($conn, $eoi_query);
        $row = mysqli_fetch_assoc($result);
        $eoi_number = $row['new_id'] + 1;

        // Make sure the Job table is created to proceed
        $job_query = "SELECT jobRefNum FROM job";
        $result = mysqli_query($conn, $job_query);
        if ($result->num_rows > 0) {
            // Prepare the INSERT statement
            $sql = "INSERT INTO eoi(EOInumber, jobRefNum, firstName, lastName, dob, gender, address, suburb, state, postcode, email, phone, HTML, CSS, JavaScript, otherSkills) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
        
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssiiiis", $eoi_number, $jobRefNum, $firstName, $lastName, $dob, $gender, $address, $suburb, $state, $postcode, $email, $phone, $HTML, $CSS, $JavaScript, $otherSkills);
        }

        // Execute the statement
        if(mysqli_stmt_execute($stmt)) {
            // Generate a unique identifier for the confirmation page, typically the EOInumber
            $redirectUrl = "confirmation.php?EOInumber=" . mysqli_stmt_insert_id($stmt);
            header("Location: $redirectUrl");
            exit();
        } else {
            echo "<p>Something is wrong with the query execution.</p>";
        }
        // Close the statement
        mysqli_stmt_close($stmt);

        // Close the connection
        mysqli_close($conn);

    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        };
    }
}



################################################  FUNCTIONS  ################################################
// Sanitize Data
function sanitize_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

// Validate postcode matches state
function validate_postcode($state, $postcode) {
    switch ($state) {
        case "VIC":
            return preg_match('/^3[0-9]{3}$/', $postcode);
        case "NSW":
            return preg_match('/^((2[0-5][0-9]{2})|(26[1-9][0-9]{2})|(2[7-8][0-9]{2})|(29[2-9][0-9]{2}))$/', $postcode);
        case "QLD":
            return preg_match('/^4[0-9]{3}$/', $postcode);
        case "NT":
            return preg_match("/^08[0-9]{2}$/", $postcode);
        case "WA":
            return preg_match('/^((66[0-9]{2})|(67[0-8][0-9])|(679[0-7]))$/', $postcode);
        case "SA":
            return preg_match('/^5[0-7][0-9]{2}$/', $postcode);
        case "TAS":
            return preg_match('/^7[0-7][0-9]{2}$/', $postcode);
        case "ACT":
            return preg_match('/^((260[0-9])|(261[0-8]))$/', $postcode);
        default:
            return false;
    }
}
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("./includes/header.inc.php");
        require_once("settings.php");

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    ?>
    <title>Confirmation Page</title>
</head>

<body>

<!-- NAV BAR -->
<header>
    <?php
        include("./includes/menu.inc.php");
    ?>
</header>

<?php

// Connect to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the EOInumber is provided in the URL
if (!isset($_GET['EOInumber'])) {
    header("Location: application.php"); // Redirect to apply if EOInumber is not provided
    exit();
}
// Retrieve EOInumber from URL
$EOInumber = $_GET['EOInumber'];

// Query database to retrieve details of the submitted expression of interest
$sql = "SELECT * FROM eoi WHERE EOInumber = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $EOInumber);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!-- NOT HOME BANNER -->
<section class="main-banner">
    <img src="./images/confirmation.png" alt="Confirmation Picture" id="banner-bg" />

    <section class="banner-overlay">
        <section class="caption">
            <h2><em>Your</em> Express Of Interest <br>
            <em>Number is <?php echo $row['EOInumber']; ?></em></h2>
        </section>
    </section>
</section>

<div class="container">
    <div class="php-success">
        <div class="success-msg">
            <h1>Your application has been submitted successfully!</h1>
            <h2>Submission details:</h2>
            <ul>
                <li><strong>EOI Number:</strong> <?php echo $row['EOInumber']; ?></li>
                <li><strong>Job Reference Number:</strong> <?php echo $row['jobRefNum']; ?></li>
                <li><strong>Name:</strong> <?php echo $row['firstName'] . ' ' . $row['lastName']; ?></li>
                <li><strong>Date of Birth:</strong> <?php echo $row['dob']; ?></li>
                <li><strong>Gender:</strong> <?php echo $row['gender']; ?></li>
                <li><strong>Address:</strong> <?php echo $row['address'] . ', ' . $row['suburb'] . ', ' . $row['state'] . ' ' . $row['postcode']; ?></li>
                <li><strong>Email:</strong> <?php echo $row['email']; ?></li>
                <li><strong>Phone:</strong> <?php echo $row['phone']; ?></li>
                <li><strong>Skills:</strong>
                    <?php
                        $skills = [];
                        if ($row['HTML']) $skills[] = 'HTML';
                        if ($row['CSS']) $skills[] = 'CSS';
                        if ($row['JavaScript']) $skills[] = 'JavaScript';
                        echo implode(", ", $skills);
                        if (empty($skills)) {
                            echo "No Preferred Skills";
                        }
                    ?>
                <li>
                    <?php
                        if (!empty($row['otherSkills'])) {
                            echo "<strong>Other skills: </strong>";
                            echo $row['otherSkills'];
                        };
                    ?>
                </li>
            </ul>
        </div>
        <img src="images/logo.png" alt="Swinburne image">
    </div>
</div>

<!-- Footer -->
<footer>
    <?php
        include("./includes/footer.inc.php");
    ?>
</footer>

</body>
</html>

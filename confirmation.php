<?php
@include 'header.inc.php';
require_once("settings.php"); // connection info

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

<div class="php-success">
    <div class="success-message">
        <h2>Your application has been submitted successfully! The submitted details are:</h2>
        <ul>
            <li><strong>EOInumber:</strong> <?php echo $row['EOInumber']; ?></li>
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
                if (!empty($row['otherSkills'])) $otherSkills = $row['otherSkills'];
                ?>
            <li><strong>Other skills:</strong> <?php echo $otherSkills ?>
            </li>
        </ul>
    </div>
    <img src="images/logo.png" alt="Confirmation image">
    <h2 class="over-text">Confirmation Details</h2>
</div>

<?php @include 'footer.inc.php'; ?>
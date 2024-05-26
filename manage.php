<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("./includes/header.inc.php");
    ?>
    <title>Manage Page</title>
<link rel="stylesheet" href="manage.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar-container">
    <div class="sidebar">
        <div class="sidebar-section">
            <form method="post" action="manage.php">
                <input type="submit" name="list_all" value="List All EOIs" class="submit-btn">
            </form>
        </div>

        <div class="sidebar-section">
            <form method="post" action="manage.php">
                <label for="jobRefNum">Job Reference Number:</label>
                <input type="text" id="jobRefNum" name="jobRefNum">
                <input type="submit" name="list_by_job" value="List EOIs by Job Reference" class="submit-btn">
            </form>
        </div>

        <div class="sidebar-section">
            <form method="post" action="manage.php">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName">
                <input type="submit" name="list_by_name" value="List EOIs by Applicant" class="submit-btn">
            </form>
        </div>
		
		<div class="sidebar-section">
            <form method="get" action="index.php">
                <input type="submit" value="Home" class="submit-btn">
            </form>
        </div>
    </div>
</div>

<!-- Table & Content -->
<div class="table-content">
	<h1 class="table-heading">Results</h1>
    <?php
    include("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    $error = "";


    // Displaying Content
    function displayResults($result) {
        echo "<table>
                <tr>
                    <th>EOI Number</th>
                    <th>Job Ref Num</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Suburb</th>
                    <th>Postcode</th>
                    <th>State</th>
                    <th>Phone</th>
                    <th>Email</th>
					<th>Skills</th>
                    <th>Other Skills</th>
                    <th>Status</th>
                </tr>";
        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['EOInumber']}</td>
                        <td>{$row['jobRefNum']}</td>
                        <td>{$row['firstName']}</td>
                        <td>{$row['lastName']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['suburb']}</td>
                        <td>{$row['postcode']}</td>
                        <td>{$row['state']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
						<td>{$row['skills']}</td>
                        <td>{$row['otherSkills']}</td>
                        <td>{$row['status']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No results found</td></tr>";
        }
        echo "</table>";
    }
	
    // Displaying all EOI
    if(isset($_POST['list_all'])) {
        $result = mysqli_query($conn, "SELECT * FROM eoi");
        displayResults($result);
    }

    // Displaying by Job Ref Num
    if(isset($_POST['list_by_job'])) {
        $jobRefNum = mysqli_real_escape_string($conn, $_POST['jobRefNum']);
        $result = mysqli_query($conn, "SELECT * FROM eoi WHERE `jobRefNum`='$jobRefNum'");
        displayResults($result);
    }

    // Displaying by Applicant
    if(isset($_POST['list_by_name'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $result = mysqli_query($conn, "SELECT * FROM eoi WHERE `firstName`='$firstName' OR `lastName`='$lastName'");
        displayResults($result);
    }

	mysqli_close($conn);
	?>
</div>

</body>
</html>

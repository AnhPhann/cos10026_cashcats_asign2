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
            <form method="post" action="manage.php">
                <label for="EOInumber">EOI Number</label>
                <input type="text" name="EOInumber" id="EOInumber">
                <label for="status">New Status:</label>
                <input type="text" name="status" id="status">
                <input type="submit" name="change_status" value="Change Status" class="submit-btn">
            </form>
        </div>
		
		<div class="sidebar-section">
            <form method="post" action="manage.php">
                <label for="eoi_number_delete">EOI ID to Delete:</label>
                <input type="text" name="eoi_number_delete" id="eoi_number_delete">
                <input type="submit" name="delete_eoi" value="Delete EOI" class="submit-btn">
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
					<th>HTML</th>
					<th>CSS</th>
					<th>JS</th>
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
						<td>" . TickOrCross($row['HTML']) . "</td>
						<td>" . TickOrCross($row['CSS']) . "</td>
						<td>" . TickOrCross($row['JavaScript']) . "</td>
						<td>{$row['otherSkills']}</td>
						<td>{$row['status']}</td>
					 </tr>";
        }
		} else {
			echo "<tr><td colspan='14'>No results found</td></tr>";
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

	// Changing EOI status
    if (isset($_POST['change_status'])) {
        $EOInumber = mysqli_real_escape_string($conn, $_POST['EOInumber']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $sql = "UPDATE eoi SET Status = '$status' WHERE EOInumber = '$EOInumber'";
        mysqli_query($conn, $sql);
    }

    // Deleting EOI from Table
    if (isset($_POST['delete_eoi'])) {
        $eoi_number_delete = mysqli_real_escape_string($conn, $_POST['eoi_number_delete']);
        $sql = "DELETE FROM eoi WHERE EOInumber = '$eoi_number_delete'";
        mysqli_query($conn, $sql);
    }

	// Tick or Cross 
	function TickOrCross($value) {
    return $value ? "&#x2714;" : "&#x2718;";
}
	mysqli_close($conn);
	?>
</div>

</body>
</html>

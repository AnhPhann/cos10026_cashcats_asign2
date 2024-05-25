<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("./includes/header.inc");
    ?>
    <title>Manage Page</title>
<link rel="stylesheet" href="manage.css">
<title>Manage EOIs</title>
</head>
<body>

<!-- Sidebar -->
<div class="main-container">
    <div class="sidebar">
        <div class="sidebar-section">
            <form method="post" action="manage.php">
                <input type="submit" name="list_all" value="List All EOIs" class="submit-btn">
            </form>
        </div>

        <div class="sidebar-section">
            <form method="post" action="manage.php">
                Job Reference Number: <input type="text" name="ref_num">
                <input type="submit" name="list_by_job" value="List EOIs by Job Reference" class="submit-btn">
            </form>
        </div>

        <div class="sidebar-section">
            <form method="post" action="manage.php">
                First Name: <input type="text" name="first_name">
                Last Name: <input type="text" name="last_name">
                <input type="submit" name="list_by_name" value="List EOIs by Applicant" class="submit-btn">
            </form>
        </div>
    </div>
</div>

<!-- Table & Content -->
<div class="table-content">
    <?php
    include("settings.php");

    $connection = mysqli_connect($host, $user, $pwd, $sql_db);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Displaying Content
    function displayResults($result) {
        echo "<table>
                <tr>
                    <th>EOI Number</th>
                    <th>Job Reference Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Suburb</th>
                    <th>Postcode</th>
                    <th>State</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Skills</th>
                </tr>";
        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['EOInumber']}</td>
                        <td>{$row['Job Reference number']}</td>
                        <td>{$row['First name']}</td>
                        <td>{$row['Last name']}</td>
                        <td>{$row['Suburb']}</td>
                        <td>{$row['Postcode']}</td>
                        <td>{$row['State']}</td>
                        <td>{$row['Phone']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Skills']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No results found</td></tr>";
        }
        echo "</table>";
    }

    if(isset($_POST['list_all'])) {
        $result = mysqli_query($connection, "SELECT * FROM eoi");
        displayResults($result);
    }

    if(isset($_POST['list_by_job'])) {
        $ref_num = mysqli_real_escape_string($connection, $_POST['ref_num']);
        $result = mysqli_query($connection, "SELECT * FROM eoi WHERE `Job Reference number`='$ref_num'");
        displayResults($result);
    }

    if(isset($_POST['list_by_name'])) {
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        $result = mysqli_query($connection, "SELECT * FROM eoi WHERE `First name`='$first_name' OR `Last name`='$last_name'");
        displayResults($result);
    }

    mysqli_close($connection);
    ?>
</div>

</body>
</html>

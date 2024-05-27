<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("./includes/header.inc.php");
    ?>
    
    <title>Manage Page</title>
</head>

<body>

<!-- NAV BAR -->
<header>
    <?php
        include("./includes/menu.inc.php");
    ?>
</header>

<!-- NOT HOME BANNER -->
<div class="main-banner">
    <img src="./images/confirmation.png" alt="Banner Background" id="banner-bg">
        
    <div class="banner-overlay">
        <div class="caption">
            <h2>HR <em>Manager</em> Page</h2>
        </div>
    </div>
</div>

<div class="container">
    <!-- Sidebar -->
    <div class="sidebar-container">
        <div class="sidebar">

            <!-- List All EOIs -->
            <div class="sidebar-section">
                <form method="post" action="manage.php">
                    <input type="submit" name="list_all" value="List All EOIs" class="submit-btn">
                </form>
            </div>
    
            <!-- List EOIs by Job Reference Number -->
            <div class="sidebar-section">
                <form method="post" action="manage.php">
                    <label for="jobRefNum">Job Reference Number:</label>
                    <input type="text" id="jobRefNum" name="jobRefNum">
                    <input type="submit" name="list_by_job" value="List EOIs by Job Reference" class="submit-btn">
                </form>
            </div>
    
            <!-- List EOIs by first name or last name or both -->
            <div class="sidebar-section">
                <form method="post" action="manage.php">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName">
                    <input type="submit" name="list_by_name" value="List EOIs by Applicant" class="submit-btn">
                </form>
            </div>
            
            <!-- Change status by EOI number -->
            <div class="sidebar-section">
                <form method="post" action="manage.php">
                    <label for="EOInumber">EOI Number</label>
                    <input type="text" name="EOInumber" id="EOInumber">

                    <label for="status">New Status:</label>
                    <select name="status" id="status">
                        <option value="">Please Select Status</option>
                        <option value="New">New</option>
                        <option value="Current">Current</option>
                        <option value="Final">Final</option>
                    </select>
                    
                    <input type="submit" name="change_status" value="Change Status" class="submit-btn">
                </form>
            </div>
            
            <!-- Delete a EOI number -->
            <div class="sidebar-section">
                <form method="post" action="manage.php">
                    <label for="eoi_number_delete">EOI ID to Delete:</label>
                    <input type="text" name="eoi_number_delete" id="eoi_number_delete">
                    <input type="submit" name="delete_eoi" value="Delete EOI" class="submit-btn">
                </form>
            </div>

            <!-- Delete all EOI of a Job Reference Number -->
            <div class="sidebar-section">
                <form method="post" action="manage.php">
                    <label for="job_ref_num_delete">Job Reference Number to Delete:</label>
                    <input type="text" name="job_ref_num_delete" id="job_ref_num_delete">
                    <input type="submit" name="delete_jobRefNum" value="Delete EOIs by Job Reference" class="submit-btn">
                </form>
            </div>
        </div>
    </div>
    
    <!-- Table & Content -->

    <!-- Sorting Feature == PHP Enhancement 2 -->
    <div class="table-content">
        <div class="sidebar-section">
            <form method="post" action="manage.php">
                <label for="sortEOIs">Sort EOIs by:</label>
                <select name="sortEOIs" id="sortEOIs">
                    <option value="EOInumber">EOI Number</option>
                    <option value="status">Status</option>
                    <option value="state">State</option>
                    <option value="gender">Gender</option>
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="JavaScript">JavaScript</option>
                </select>
                <input type="submit" name="sort_eoi" value="Sort EOIs" class="submit-btn">
            </form>
        </div>

        <h1 class="table-heading">Results:</h1>

        <div class="table-result">

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
                                <th>Address</th>
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
                                    <td>{$row['formatted_dob']}</td>
                                    <td>{$row['address']}</td>
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
                    $sql = "SELECT *, DATE_FORMAT(dob, '%d/%m/%Y') AS formatted_dob FROM eoi";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        echo "<p>There is no table or nothing in the table</p>";
                    } else {
                        echo "<h2 class='result'>All EOIs</h2>";
                        displayResults($result);
                    }
                }

                // Displaying by Job Ref Num
                if(isset($_POST['list_by_job'])) {
                    $jobRefNum = mysqli_real_escape_string($conn, $_POST['jobRefNum']);
                    $sql = "SELECT *, DATE_FORMAT(dob, '%d/%m/%Y') AS formatted_dob FROM eoi WHERE `jobRefNum`='$jobRefNum'";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        echo "<p>There is no application for $jobRefNum or nothing in the table</p>";
                    } else {
                        echo "<h2 class='result'>EOIs sorted by $jobRefNum.</h2>";
                        displayResults($result);
                    }
                }

                // Displaying by Applicant
                if(isset($_POST['list_by_name'])) {
                    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
                    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
                    $sql = "SELECT *, DATE_FORMAT(dob, '%d/%m/%Y') AS formatted_dob FROM eoi WHERE `firstName`='$firstName' OR `lastName`='$lastName'";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        echo "<p>There is no applicants named $firstName $lastName or nothing in the table</p>";
                    } else {
                        echo "<h2 class='result'>EOIs sorted by $firstName $lastName.</h2>";
                        displayResults($result);
                    }
                }

                // Changing EOI status
                if (isset($_POST['change_status'])) {
                    if(isset($_POST['EOInumber']) && isset($_POST['status'])) {
                        $EOInumber = mysqli_real_escape_string($conn, $_POST['EOInumber']);
                        $status = mysqli_real_escape_string($conn, $_POST['status']);
                        $sql = "UPDATE eoi SET Status = '$status' WHERE EOInumber = '$EOInumber'";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            echo "<p>There is no applicants has the number of $EOInumber to change or nothing in the table</p>";
                        } else {
                            echo "<h2 class='result'>Successfully changed status '$status' for EOI number $EOInumber.</h2>";
                        }
                    }
                }

                // Deleting EOI from Table
                if (isset($_POST['delete_eoi'])) {
                    if(isset($_POST['eoi_number_delete'])) {
                        $eoi_number_delete = mysqli_real_escape_string($conn, $_POST['eoi_number_delete']);
                        $sql = "DELETE FROM eoi WHERE EOInumber = '$eoi_number_delete'";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            echo "<p>There is no applicants has the number of $eoi_number_delete to delete or nothing in the table</p>";
                        } else {
                            echo "<h2 class='result'>Successfully deleted EOI number $eoi_number_delete.</h2>";
                        }
                    }
                }

                // Deleting EOI by Job Reference Number
                if (isset($_POST['delete_jobRefNum'])) {
                    if(isset($_POST['job_ref_num_delete'])) {
                        $job_ref_num_delete = mysqli_real_escape_string($conn, $_POST['job_ref_num_delete']);
                        $sql = "DELETE FROM eoi WHERE JobRefNum = '$job_ref_num_delete'";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            echo "<p>There is no applicants applied for '$job_ref_num_delete' to delete or nothing in the table</p>";
                        } else {
                            echo "<h2 class='result'>Successfully deleted all EOI numbers applied for the '$job_ref_num_delete'.</h2>";
                        }
                    }
                }

                // Sorting Feature = PHP Enhancement 2
                if (isset($_POST["sort_eoi"])) {
                    $sorts = ["EOInumber", "status", "state", "gender", "HTML", "CSS", "JavaScript"];
                    if (in_array($_POST["sortEOIs"], $sorts)) {
                        $sortEOIs = mysqli_real_escape_string($conn, $_POST["sortEOIs"]);
                        $sql = "SELECT *, DATE_FORMAT(dob, '%d/%m/%Y') AS formatted_dob FROM eoi ORDER BY $sortEOIs";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            echo "<p>Something went wrong</p>";
                        } else {
                            echo "<h2 class='result'>EOIs sorted by $sortEOIs.</h2>";
                            displayResults($result);
                        }
                    }
                }

                // Tick or Cross 
                function TickOrCross($value) {
                    return $value ? "&#x2714;" : "&#x2718;";
                }

                mysqli_close($conn);
            ?>
        </div>
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

<?php
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die ("Database connection failed: " . mysqli_connect_error());
} else {    
    // Create Job table if table not exist
    $job_query = "CREATE TABLE IF NOT EXISTS job (
        JobRefNum CHAR(5) PRIMARY KEY,
        Description VARCHAR(350)
    )";
    
    // Store Job Description Into Database
    $insert_job = "INSERT INTO job (JobRefNum, Description)
        SELECT * FROM (SELECT 'WDE01', 'As a Web Developer you will be assigned the responsibility of handling the designing, coding, and modification of websites aiding to our clients\' requirements.') AS tmp
        WHERE NOT EXISTS (SELECT JobRefNum FROM job WHERE JobRefNum = 'WDE01')
        UNION ALL
        SELECT * FROM (SELECT 'SAN02', 'Being a Systems Analyst will consist of conducting research into technology systems, examining current software and hardware setups, and developing creative ways to enhance the organization technical infrastructure and procedures are all part of the job description of a systems analyst.') AS tmp
        WHERE NOT EXISTS (SELECT JobRefNum FROM job WHERE JobRefNum = 'SAN02')
        UNION ALL
        SELECT * FROM (SELECT 'ITS03', 'Being an IT Support Specialist will involve you providing technical support and assistance to customers and users, troubleshooting issues provided to you and ensuring the effective functionality of computers, networks and systems. This position will requirements you to have solve issues handed at you, and provide efficient communication skills.') AS tmp
        WHERE NOT EXISTS (SELECT JobRefNum FROM job WHERE JobRefNum = 'ITS03')";

    mysqli_query($conn, $job_query);
    mysqli_query($conn, $insert_job);
}
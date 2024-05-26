<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("./includes/header.inc.php");
        require_once("settings.php");

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    ?>

    <title>PHP Enhancements</title>
</head>

<body>

<!-- NAV BAR -->
<header>
    <?php
        include("./includes/menu.inc.php");
    ?>
</header>

<!-- NOT HOME BANNER -->
<section class="main-banner">
    <img src="./images/confirmation.png" alt="Banner Background" id="banner-bg" />

    <section class="banner-overlay">
        <section class="caption">
        <h2>Our <em>PHP</em> Enhancements</h2>
        </section>
    </section>
</section>

<!-- PHP Store And Show Enhancement -->
<section class="en-container en-bg">
    <article class="en-title">
        <h2>PHP Store and Show Enhancement</h2>
        <a href="jobs.php">Click me to view actual usage of it.</a>
    </article>
    
    <section class="en-vis">
        <p>
            Database Design To store job descriptions in a database, you can create a table with columns 
            for the various fields such as job title, description, requirements, location, etc. Use appropriate 
            data types for each column. For example, use VARCHAR for text fields and DATE for the posting date. 
            Assign a unique identifier (primary key) to each job posting. A vertical table design, where each data 
            field is stored in a separate row rather than a separate column, provides flexibility to add new fields 
            without altering the table structure.
        </p>
        
        <p>
            Inserting Job Postings Create a PHP script to handle inserting new job postings into the database. 
            The script should accept the job details submitted through an HTML form, sanitize the input to prevent 
            SQL injection attacks, and insert the data into the appropriate database table using an SQL INSERT query. 
            Use prepared statements with parameterized queries for improved security. After a successful insert, 
            the script can redirect back to the job listings page.
        </p>
        
        <section class="en-vis-img">
            <img src="images/php-vis-1-1.png" alt="PHP Store Picture 1">
            <img src="images/php-vis-1-4.png" alt="PHP Store Picture 4">
        </section>

        <p>
            Retrieving and Displaying Jobs To display the job postings on your website, create a PHP 
            script that retrieves the data from the database using a SELECT query. Loop through the result 
            set and dynamically generate the HTML for each job posting. Use PHP to populate the job details 
            within the appropriate HTML elements. You can apply styling with CSS classes. Consider adding 
            pagination if you have many postings.
        </p>

        <section class="en-vis-img">
            <img src="images/php-vis-1-2.png" alt="PHP Store Picture 2">
            <img src="images/php-vis-1-3.png" alt="PHP Store Picture 3">
        </section>

        <p>
            Editing and Deleting Jobs Implement functionality to allow editing and deleting job postings. 
            For editing, retrieve the job details from the database and pre-populate them in an HTML form. 
            On form submission, update the corresponding database record using an UPDATE query. For deletion, 
            prompt for confirmation before removing the record with a DELETE query. Use POST requests for 
            these actions to avoid accidental deletions through URL manipulation.
        </p>
    </section>
</section>

<!-- PHP Sorting Function Enhancement -->
<section class="en-container">
    <article class="en-title">
        <h2>PHP Sorting Function Enhancement</h2>
        <a href="manage.php">Click me to view actual usage of it.</a>
    </article>
    
    <section class="en-vis">
        <p>
            Adding Sorting Options To allow the manager to sort the EOI records by a selected field, 
            you can add sorting links or buttons for each sortable column in the table header. When generating 
            the table header dynamically with PHP, check if the current column is allowed for sorting. If so, 
            create a hyperlink that passes the column name and sort order (ascending or descending) as URL 
            parameters to the PHP script. You can use an array to define the allowed columns for sorting as 
            a security measure to prevent SQL injection. 
        </p>
        
        <section class="en-vis-img">
            <img src="images/php-vis-2-1.png" alt="PHP Sorting Picture 1">
            <img src="images/php-vis-2-2.png" alt="PHP Sorting Picture 2">
        </section>

        <p>
            Handling the Sorting Request In your PHP script, retrieve the requested column and sort order 
            from the URL parameters using the $_GET superglobal. Validate the column name against the predefined 
            array of allowed columns. If the column is valid, use it in the SQL query's ORDER BY clause. 
            Determine the sort order based on the URL parameter, defaulting to ascending order if not specified. 
            Modify your SQL query to include the ORDER BY clause with the selected column and sort order.
        </p>

        <p>
            Updating the Table Display After retrieving the sorted EOI records from the database, dynamically 
            generate the HTML table rows in the desired order. You can highlight the currently sorted column by 
            adding a CSS class to the corresponding table header and data cells. Indicate the current sort order 
            using icons or arrows next to the sorted column header. Include the appropriate URL parameters in the 
            sorting links to toggle between ascending and descending order for each column.
        </p>
    </section>
</section>

<!-- Footer -->
<footer>
    <?php
        include("./includes/footer.inc.php");
    ?>
</footer>
    
</body>
</html>
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

<!-- NOT HOME BANNER -->
<section class="main-banner">
    <img src="./images/confirmation.png" alt="Confirmation Picture" id="banner-bg" />

    <section class="banner-overlay">
        <section class="caption">
            <h2><em>ERROR</em></h2>
        </section>
    </section>
</section>

<div class="container">
    <div class="php-success">
        <div class="success-msg">
            <h1>Errors details:</h1>
            <ul>
                <?php
                session_start();

                // Check if there are any errors stored in the session
                if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                    foreach($_SESSION['errors'] as $error) {
                        echo "<p>$error</p>";
                    }
                    // Unset the errors once they have been displayed to prevent showing them again
                    unset($_SESSION['errors']);
                } else {
                    echo "<li>No errors found.</li>";
                }
                ?>
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


<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("./includes/header.inc");
    ?>
    <title>Login Page</title>
</head>

<body>
    <header>
        <?php
            include_once("./includes/menu.inc");
        ?>
    </header>

    <form action="manage.php" method="post">
        <div class="login-container">
        <div class="login-box">
                <h2>Login</h2>
                    <div class="login-textbox">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="login-textbox">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" class="login-btn">Login</button>
            </div>
        </div>
    </form>

    <footer>
        <?php
            include_once("./includes/footer.inc");
        ?>
    </footer>
    
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("./includes/header.inc.php");
    ?>

    <title>Job Application</title>
</head>

<body>
    
    <!-- NAV BAR -->
    <header>
        <?php
            include_once("./includes/menu.inc.php");
        ?>
    </header>
  
  <!-- NOT HOME BANNER -->
    <div class="main-banner">
        <img src="./images/cat-bg.png" alt="Banner Background" id="banner-bg">
            
        <div class="banner-overlay">
            <div class="caption">
                <h2>
                    <em>Interested?</em><br>
                    Join our team!!
                </h2>
            </div>
        </div>
    </div>
  
  <!-- FORM -->
    <form action="processEOI.php" class="apply-form" method="post">
        <fieldset class="form-group">
            <label for="jobRefNum">Job Reference Number:</label>
            <input type="text" id="jobRefNum" name="jobRefNum" pattern="[a-zA-Z0-9]{5}"
                placeholder="Enter Job Reference Number" autofocus="1" aria-label="Job Reference Number" >
        </fieldset>
            
        <fieldset class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" maxlength="20" 
                placeholder="Enter Your First Name" autofocus="1" aria-label="First Name" >
        </fieldset>
                
        <fieldset class="form-group">
            <label for="lastName">Last Name:</label> 
            <input type="text" id="lastName" name="lastName" maxlength="20" 
                placeholder="Enter Your Last Name" autofocus="1" aria-label="Last Name" > 
        </fieldset>

        <fieldset class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" placeholder="mm/dd/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" >
        </fieldset>

        <fieldset class="form-group">
            <label for="gender">Gender:</label>
            <section class="grid-container">
                <label class="grid-body" for="male">Male <div class="fixed-radio"><input type="radio" name="gender" value="Male" ></div></label>
                <label class="grid-body" for="female">Female <div class="fixed-radio"><input type="radio" name="gender" value="Female" ></div></label>
                <label class="grid-body" for="others">Others <div class="fixed-radio"><input type="radio" name="gender" value="Other" ></div></label>
            </section>
        </fieldset>

        <fieldset class="form-group">
            <label for="address">Street Address:</label>
            <input type="text" id="address" name="address" maxlength="40"
                placeholder="Enter Your Street Address" autofocus="1" aria-label="Street Address" > 
        </fieldset>

        <fieldset class="form-group">
            <label for="suburb">Suburb/Town:</label>
            <input type="text" id="suburb" name="suburb" maxlength="40" 
                placeholder="Enter Your Suburb / Town" autofocus="1" aria-label="Suburb/Town" > 
        </fieldset>
        
        <fieldset class="form-group">
            <label for="state">State:</label>
            <select id="state" name="state" >
                <option value="">Please Select Your State</option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
            </select>
        </fieldset>
        
        <fieldset class="form-group">
            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" pattern="[0-9]{4}" 
                placeholder="Enter your Postcode" autofocus="1" aria-label="Enter your Postcode" > 
        </fieldset>
        
        <fieldset class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" 
                placeholder="Enter your email" autofocus="1" aria-label="Enter your email" > 
        </fieldset>
        
        <fieldset class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9\s]{8,12}" 
                placeholder="Enter your phone number" autofocus="1" aria-label="Enter your phone number" >
        </fieldset>

        <fieldset class="form-group">
            <label>Skills:</label>
            <section class="fixed">
                <article><input type="checkbox" name="HTML" value="1">HTML</article>
                <article><input type="checkbox" name="CSS" value="1">CSS</article>
                <article><input type="checkbox" name="JavaScript" value="1">JavaScript</article>
            </section>
        </fieldset>

        <fieldset class="form-group">
            <label for="otherSkills">Other Skills:</label>
            <textarea id="otherSkills" name="otherSkills" placeholder="i.e. Java / C / C++ / Python / ..." rows="4"></textarea>
        </fieldset>

        <section class="apply-button">
            <input type="reset" class="btn" value="Reset">
            <input type="submit" class="btn" value="Apply">
        </section>
    </form>


    <!-- Footer -->
    <footer>
        <?php
            include("./includes/footer.inc.php");
        ?>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("./includes/header.inc");
    ?>
    <title>Job Application</title>
</head>

<body>
    
    <!-- NAV BAR -->
    <header>
        <?php
            include_once("./includes/menu.inc");
        ?>
    </header>

  
  <!-- NOT HOME BANNER -->
    <div class="main-banner">
        <img src="./images/cat-bg.png" alt="" id="banner-bg">
            
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
    <form action="https://mercury.swin.edu.au/it000000/formtest.php" class="apply-form" method="post">
        <fieldset class="form-group">
            <label for="jobRefNum">Job Reference Number:</label>
            <input type="text" id="jobRefNum" name="jobRefNum" pattern="[a-zA-Z0-9]{5}"
                placeholder="Enter Job Reference Number" autofocus="1" aria-label="Job Reference Number" require>
        </fieldset>
            
        <fieldset class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" maxlength="20" 
                placeholder="Enter Your First Name" autofocus="1" aria-label="First Name" required>
        </fieldset>
                
        <fieldset class="form-group">
            <label for="lastName">Last Name:</label> 
            <input type="text" id="lastName" name="lastName" maxlength="20" 
                placeholder="Enter Your Last Name" autofocus="1" aria-label="Last Name" required> 
        </fieldset>

        <fieldset class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" placeholder="dd/mm/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" required>
        </fieldset>

        <fieldset class="form-group">
            <label for="gender">Gender:</label>
            <section class="grid-container">
                <label class="grid-body" for="male">Male<input type="radio" name="gender" value="Male" required></label>
                <label class="grid-body" for="female">Female<input type="radio" name="gender" value="Female" required></label>
                <label class="grid-body" for="others">Others<input type="radio" name="gender" value="Other" required></label>
            </section>
        </fieldset>

        <fieldset class="form-group">
            <label for="address">Street Address:</label>
            <input type="text" id="address" name="address" maxlength="40"
                placeholder="Enter Your Street Address" autofocus="1" aria-label="Street Address" required> 
        </fieldset>

        <fieldset class="form-group">
            <label for="suburb">Suburb/Town:</label>
            <input type="text" id="suburb" name="suburb" maxlength="40" 
                placeholder="Enter Your Suburb / Town" autofocus="1" aria-label="Suburb/Town" required> 
        </fieldset>
        
        <fieldset class="form-group">
            <label for="state">State:</label>
            <select id="state" name="state" required>
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
                placeholder="Enter your Postcode" autofocus="1" aria-label="Enter your Postcode" required> 
        </fieldset>
        
        <fieldset class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" 
                placeholder="Enter your email" autofocus="1" aria-label="Enter your email" required> 
        </fieldset>
        
        <fieldset class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9\s]{8,12}" 
                placeholder="Enter your phone number" autofocus="1" aria-label="Enter your phone number" required>
        </fieldset>

        <fieldset class="form-group">
            <label for="skills">Skills:</label>
            <section class="grid-container">
                <label class="grid-body" for="HTML">HTML<input type="checkbox" name="skills[]" value="HTML" required></label>
                <label class="grid-body"for="CSS">CSS<input  type="checkbox" name="skills[]" value="CSS" required></label>
                <label class="grid-body" for="JavaScript">JavaScript<input type="checkbox" name="skills[]" value="JavaScript" required></label>
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
            include_once("./includes/footer.inc");
        ?>
    </footer>
</body>
</html>
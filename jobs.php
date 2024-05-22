<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("./includes/header.inc");
    ?>
    <title>Home Page</title>
</head>

<body>

<!-- NAV BAR -->
<header>
    <?php
        include_once("./includes/menu.inc");
    ?>
</header>

<!-- NOT HOME BANNER -->
<article class="main-banner">
    <img src="./images/cat-bg.png" alt="" id="banner-bg" />

    <section class="banner-overlay">
    <section class="caption">
        <h2>Our <em>Jobs</em></h2>
    </section>
    </section>
</article>

 <article class="job-container">
    <section class="job-header">
        <h1 class="text-center">Featured Job Listing</h1>
    </section>

    <!-- WEB DEVELOPER ROLE -->
    <article class="job-description">
        <article class="job-thumb">
            <section class="job-img">
                <img src="images/web-dev-logo.png" alt="Web Developer Logo">
            </section>
            
            <section class="middle">
                <h2>Web Developer</h2>
                <h4>Reference Number: WDE00001</h4>
                <p><i class="material-icons">location_on</i>Melbourne, VIC, Australia</p>
                <p><i class="material-icons">attach_money</i>A$70,000 - A$80,000</p>
                <p><i class="material-icons">access_time</i>Full-time</p>
            </section>
        </article>
        
        <input type="checkbox" id="toggle-details-web-dev" />
        <label class="view-button text-center" for="toggle-details-web-dev" alt="View Details button"></label>

        <article class="description-content">
            <p class="subtitle">
                Are you enthuastic about creating a smooth & seamless digital experiences? Join alongside the team at CashCats as a 
                driven and confident Web Developer, where your expertise will help redefine the standard for websites.
            </p>
            <section class="job-content">
                <h3>Description</h3>
                <p>
                    As a Web Developer you will be assigned the responsibility of handling the designing, coding, and modification of websites 
                    aiding to our clients requirements.
                </p> 
                <h3>Responsibility</h3>
                <ol>
                    <li>Planning and designing websites for clients.</li> 
                    <li>Prototyping and creating mockup websites to receive feedback on.</li>
                    <li>Ensuring and maintaining security of websites, seamless functionality and browser-friendly compatibility.</li>
                    <li>Testing and optimisation of website across devices and clients ensuring accessibility guidelines are met.</li>
                </ol>
                <h3>Essential Qualifications</h3>
                <ul>
                    <li>Bachelor's degree in Computer Science, Information Technology, or related field.
                    <li>2+ years of experience as a Web Developer.</li>
                    <li>Experience with responsive web design principles.</li>
                    <li>Ability to write clean, well-documented, and maintainable code.</li>
                </ul>
                <h3>Preferred Qualifications</h3>
                <ul>
                    <li>Experience with front-end frameworks (React, Angular).</li>
                    <li>Prior knowledge of back-end frameworks (Python, Node.js, PHP)</li>
                    <li>Experimentation with version control systems. (GIT)</li>
                </ul>
            </section>
            
            <section class="main-button">
                <a href="application.html">Apply Now</a>
            </section>
        </article>
    </article>

    <aside>
        <h2>Fun Fact:</h2>
        <p>The First Commercial Website Was Built by a Pizza Hut Employee in 1994.</p>
        <p>Cre: <a href="https://en.wikipedia.org/wiki/Pizza_Hut">Wikipedia | Pizza Hut</a></p>
    </aside>


    <!-- SYSTEM ANALYST ROLE -->
    <article class="job-description">
        <article class="job-thumb">
            <section class="job-img">
                <img src="images/sys-ana-logo.png" alt="System Analyst Logo">
            </section>
            
            <section class="middle">
                <h2>Systems Analyst</h2>
                <h4>Reference Number: SAN00031</h4>
                <p><i class="material-icons">location_on</i>Melbourne, VIC, Australia</p>
                <p><i class="material-icons">attach_money</i>A$80,000 - A$100,000</p>
                <p><i class="material-icons">access_time</i>Full-time</p>
            </section>
        </article>
        
        <input type="checkbox" id="toggle-details-sys-ana" />
        <label class="view-button text-center" for="toggle-details-sys-ana" alt="View Details button"></label>

        <article class="description-content">
            <p class="subtitle">
                Are you a passionate and innovative System Analyst open to embracing new approaches and maintaining 
                a strong focus on enhancing data analytics and designing new ways to manage and handle data.
            </p>
            <section class="job-content">
                <h3>Description</h3>
                <p>
                    Being a Systems Analyst will consist of conducting research into technology systems, examining current 
                    software and hardware setups, and developing creative ways to enhance the organization's technical 
                    infrastructure and procedures are all part of the job description of a systems analyst.
                </p> 
                <h3>Responsibility</h3>
                <ol>
                    <li>Evaluating and endorsing certain softwares & software tools.</li> 
                    <li>Collaborating with other software developers, software engineers and IT specialists to guarantee technology reliability</li>
                    <li>Implementing or selecting software packages to be used by the organisation.</li>
                </ol>
                <h3>Essential Qualifications</h3>
                    <ul>
                        <li>Bachelor's degree in Computer Science, IT or a related field with equivalent experience.</li>
                        <li>Master's degree in System Analytics or related field.</li>
                        <li>Ability to identify and dissect problems and present effective solutions.</li>
                    </ul>
                <h3>Preferred Qualifications</h3>
                <ul>
                    <li>Postgraduate work in business analytics or data analytics environment.</li>
                    <li>Familiarity with analytical software and data visualization tools.</li>
                </ul>
            </section>
            
            <section class="main-button">
                <a href="application.html">Apply Now</a>
            </section>
        </article>
    </article>

    <aside>
        <h2>Fun Fact:</h2>
        <p>Some of the First Video Games Relied on System Analysts for Design and Development.</p>
        <p>Cre: <a href="https://news.stanford.edu/2023/08/04/no-extra-lives-stanfords-role-quest-save-video-games/">Stanford News | No extra lives</a></p>
    </aside>

    <!-- IT SUPPORT SPECIALIST ROLE -->
    <article class="job-description">
        <article class="job-thumb">
            <section class="job-img">
                <img src="images/sup-spe-logo.png" alt="IT Support Specialist Logo">
            </section>
            
            <section class="middle">
                <h2>IT Support Specialist</h2>
                <h4>Reference Number: ITS00021</h4>
                <p><i class="material-icons">location_on</i>Melbourne, VIC, Australia</p>
                <p><i class="material-icons">attach_money</i>A$40,000 - A$55,000</p>
                <p><i class="material-icons">access_time</i>Full-time</p>
            </section>
        </article>
        
        <input type="checkbox" id="toggle-details-sup-spe" />
        <label class="view-button text-center" for="toggle-details-sup-spe" alt="View Details button"></label>

        <article class="description-content">
            <p class="subtitle">
                Are you a tech-savvy individual with a strong eye to provide seamless IT support for individuals 
                and keep their systems running smoothly across the globe?
            </p>
            <section class="job-content">
                <h3>Description</h3>
                <p>Being an IT Support Specialist will involve you providing technical support and assistance to customers and users,
                    troubleshooting issues provided to you and ensuring the effective functionality of computers, networks and systems. 
                    This position will requirements you to have solve issues handed at you, and provide efficient communication skills.
                </p> 
                <h3>Responsibility</h3>
                <ol>
                    <li>Providing technical support to customers, troubleshooting hardware, software, and network problems..</li> 
                    <li>Keeping up-to-date with the newest technological advancements and developments, recommending upgrades.</li>
                    <li>Respond to help-desk problems and effectively communicate/resolve technical issues.</li>
                </ol>
                <h3>Essential Qualifications</h3>
                <ul>
                    <li>Associate's degree in IT or equivalent experience in related field.</li>
                    <li>Excellent communication and interpersonal skills.</li>
                    <li>Fluent in the English language.</li>
                    <li>Ability to have an analytical and solution-oriented mindset, identify issues and think critically.</li>
                </ul>
                <h3>Preferred Qualifications</h3>
                <ul>
                    <li>Bachelor's degree in Information Technology or related field.</li>
                    <li>Prior experience in IT support or help-desk jobs.</li>
                    <li>A strong learning attitude and able to adapt to new situations.</li>
                </ul>
            </section>
            
            <section class="main-button">
                <a href="application.html">Apply Now</a>
            </section>
        </article>
    </article>

    
    <aside>
        <h2>Fun Fact:</h2>
        <p>They've likely saved the day (or at least the meeting) more times than they'll ever get credit for.</p>
        <p>Cre: <a href="https://www.reddit.com/r/sysadmin/comments/qcn4yu/what_is_your_funniest_it_ticket_story/">Reddit | What is your funniest IT ticket story</a></p>
    </aside>

 </article>

    <!-- Footer -->
    <footer>
        <?php
            include_once("./includes/footer.inc");
        ?>
    </footer>    
  </body>
</html>

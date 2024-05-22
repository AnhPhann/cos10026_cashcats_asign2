<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("./includes/header.inc");
    ?>
    <title>Home Page</title>
</head>

<body>

<!-- Nav Bar -->
<header>
    <?php
        include_once("./includes/menu.inc");
    ?>
</header>

<!-- Banner -->
<article class="main-banner">
    <video autoplay muted loop id="bg-video">
        <source src="./images/programmer cat.mp4" type="video/mp4" />
    </video>

    <section class="video-overlay">
        <div class="caption">
            <h2>Find your desired <em>Job</em></h2>
            <section class="main-button">
                <a href="jobs.html">View Our Jobs</a>
            </section>
        </section>
    </section>
</article>

<!-- Content -->
<article class="main-content">
    <section class="head-content">
        <h2 class="text-center">Why <em>CashCats</em>?</h2>
    </section>
    <section class="content-box">
        <section class="content-1">
            <img src="images/con-1.png" alt="Technology">
            <p>Immersive technology exposure awaits.</p>
        </section>
        <section class="content-2">
            <img src="images/con-2.png" alt="Collaborative">
            <p>Thrive within collaborative team environments.</p>
        </section>
        <section class="content-2">
            <img src="images/con-3.png" alt="Acceleration">
            <p>Abundant avenues for career acceleration.</p>
        </section>
        <section class="content-2">
            <img src="images/con-4.png" alt="Initiatives">
            <p>Engage in pioneering project initiatives.</p>
        </section>
    </section>
</article>

<article class="main-video">
    <section class="large-video">
       <iframe width="560" height="315" src="https://www.youtube.com/embed/xUUtFcprgjA" title="YouTube video player" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
                picture-in-picture; web-share" allowfullscreen>
        </iframe>
       <h3 class="video-title"><a href="https://youtu.be/xUUtFcprgjA">We Created Our Website Guideline</a></h3>
       <h3 class="video-title"><a href="https://youtu.be/xUUtFcprgjA">https://youtu.be/xUUtFcprgjA</a></h3>
    </section>
</article>

<!-- Feature Jobs -->
<article class="jobs-section">
    <section class="section-heading">
        <h2 class="text-center">Our Featured <em>Jobs</em></h2>
    </section>
    <section class="section-content">
        <section class="jobs-demo">
            <img src="images/jobs-demo-1.png" alt="IT1">
            <span><em>A$70,000+</em></span>
            <h4>Web Developer</h4>
            <p><strong>Reference Number:</strong> WDE0001</p>
            <p>Full-stack Developer</p>
            <ul class="social-icons">
                <li><a href="jobs.php">+ View More</a></li>
            </ul>
        </section>
        <section class="jobs-demo">
            <img src="images/jobs-demo-2.png" alt="IT2">
            <span><em>A$80,000+</em></span>
            <h4>Systems Analyst</h4>
            <p><strong>Reference Number:</strong> SAN0031</p>
            <p>Database Managment</p>            
            <ul class="social-icons">
                <li><a href="jobs.php">+ View More</a></li>
            </ul>
        </section>
        <section class="jobs-demo">
            <img src="images/jobs-demo-3.png" alt="IT3">
            <span><em>A$40,000+</em></span>
            <h4>IT Supporter</h4>
            <p><strong>Reference Number:</strong> ITS0021</p>
            <p>Technical Assistance</p>            
            <ul class="social-icons">
                <li><a href="jobs.php">+ View More</a></li>
            </ul>
        </section>
    </section>
</article>

<!-- Country -->
<article class="country-section">
    <section class="country-heading">
        <section class="country-content">
            <h2><em>Acknowledgement</em> of Country</h2>
            <p>
                We respectfully acknowledge the Wurundjeri People of the Kulin Nation, who are the Traditional 
                Owners of the land on which Swinburne’s Australian campuses are located in Melbourne’s east 
                and outer-east, and pay our respect to their Elders past, present and emerging.
            </p>
            <p>
                We are honoured to recognise our connection to Wurundjeri Country, history, culture and 
                spirituality through these locations, and strive to ensure that we operate in a manner 
                that respects and honours the Elders and Ancestors of these lands.
            </p>
            <p>
                We also acknowledge and respect the Traditional Owners of lands across Australia, 
                their Elders, Ancestors, cultures and heritage.
            </p>
            <p><em>Swinburne University of Technology. (n.d.). Melbourne | Australia. <a href="https://www.swinburne.edu.au/">https://www.swinburne.edu.au/</a></em></p>
        </section>
        <a href="https://www.swinburne.edu.au/about/strategy-initiatives/moondani-toombadool-centre/">Find out more    →</a>
    </section>
    <section class="country-picture">
        <img src="images/acknowledgement-to-country.jpg" alt="">
    </section>
</article>

<!-- Footer -->
<footer>
    <?php
        include_once("./includes/footer.inc");
    ?>
</footer>

</body>

</html>
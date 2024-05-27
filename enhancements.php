<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("./includes/header.inc.php");
    ?>

    <title>Our Enhancements</title>
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
    <img src="./images/cat-bg.png" alt="Banner Background" id="banner-bg" />

    <section class="banner-overlay">
        <section class="caption">
        <h2>Our Captivating <em>Enhancements</em></h2>
        </section>
    </section>
</section>

<!-- CSS Hover Enhancement -->
<section class="en-container en-bg">
    <article class="en-title">
        <h2>CSS Hover Enhancement</h2>
        <a href="about.php">Click me to view actual usage of it.</a>
    </article>
    
    <section class="en-vis">
        <p>
            In our user interface design, we have incorporated a feature where descriptions associated
             with images, cards, or pictures are displayed directly beneath them. This feature
              is activated when a user hovers over these elements. The descriptions provide additional
               context or information about the content of these visual elements, enhancing the user’s
                understanding and interaction with them..
        </p>
        <p>
            Moreover, we have implemented a direct access functionality. This allows users to navigate
             to the content related to these images, cards, or pictures simply by clicking on them.
              This feature not only streamlines the navigation process but also saves time, making
               the user experience more efficient.
        </p>
        <p>
            These design choices are guided by our commitment to creating a user-friendly interface.
             We believe that an accessible and intuitive design is key to a positive user experience.
              By providing clear descriptions and easy navigation, we aim to make our interface not
               only easy to use, but also engaging and informative. This approach ensures that our
                users can interact with our platform in a seamless and enjoyable manner.
        </p>
        <section class="en-vis-img">
            <img src="images/en-vis1-1.png" alt="CSS Hover 1">
            <img src="images/en-vis1-2.png" alt="CSS Hover 2">
        </section>
        <p>
            In addition to the aforementioned features, the descriptions will be displayed on a
             linear gradient background, which contributes to a visually pleasing and easy-to-read
              interface. This background will commence with a color of black at zero opacity,
               gradually transitioning to full opacity. Notably, when the gradient reaches 10% of
                the background, the opacity will be adjusted to 0.3. This subtle change in opacity
                 enhances the readability of the text, ensuring a user-friendly experience.
        </p>
    </section>
</section>

<!-- CSS COLLAPSE ENHANCEMENT -->
<section class="en-container">
    <article class="en-title">
        <h2>CSS Collapse Enhancement</h2>
        <a href="jobs.php">Click me to view actual usage of it.</a>
    </article>
    
    <section class="en-vis">
        <p>
            Upon clicking the ‘View Details’ button, users are presented with a comprehensive description
            of the parent job listing. This description is dynamically loaded into a block element on the
            page, pushing the content below it further down. This dynamic content loading is achieved
            through the implementation of Cascading Style Sheets (CSS), a style sheet language used
                for describing the look and formatting of a document written in HTML.
        </p>
        <p>
            The primary advantage of this feature is that it allows users to access more information
            without navigating away from the current page, thereby improving the user experience.
            The description block provides in-depth details about the job listing, which is extremely
            beneficial for users who have been intrigued by the job title and wish to learn more.
        </p>
        <section class="en-vis-img">
            <img src="images/en-vis-2.png" alt="CSS Collapse">
        </section>
        <p>
            This CSS enhancement not only enriches the functionality of the website but also
             contributes to a more engaging and user-friendly interface. It exemplifies the
              website’s commitment to providing a seamless and efficient platform for IT recruitment.
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
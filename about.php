<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("./includes/header.inc");
    ?>
    <title>About Us</title>
</head>
<body>
<!-- NAV BAR -->
<header>
   <?php
    include_once("./includes/menu.inc");
    ?>
</header>

<!-- NOT HOME BANNER -->
<section class="main-banner">
    <img src="./images/cat-bg.png" alt="" id="banner-bg">
            
        <section class="banner-overlay">
            <section class="caption">
                <h2>About <em>Us</em></h2>
            </section>
        </section>
    </section>

<!-- ABOUT US -->
<article class="team-des">
    <h1 class="text-center">What is CashCats?</h1>
    
    <section class="about-list">
        <p>
            CashCats is a leading IT company specializing in innovative solutions for businesses 
            worldwide. With a focus on cutting-edge technology and customer-centric approaches, 
            we empower organizations to thrive in the digital age. From software development to 
            cybersecurity, our dedicated team delivers tailored solutions that drive efficiency, 
            productivity, and growth. At CashCats, we're committed to transforming ideas into 
            tangible results, ensuring our clients stay ahead in today's dynamic marketplace.
        </p>

        <dl>
            <section>
                <dt>Group Name: </dt>
                <dd>CashCats</dd>
            </section>
            <section>
                <dt>Group ID: </dt>
                <dd>1</dd>
            </section>
            <section>
                <dt>Tutor: </dt>
                <dd>Yi Tian</dd>
            </section>
            <section>
                <dt>Course: </dt>
                <dd>COS10026</dd>
            </section>
        </dl>
    </section>
</article>

<article class="team-des">
    <h1 class="text-center">The CashCats Team</h1>
    <section class="team-picture">
        <img src="./images/Group.png" alt="Group Photo">
    </section>
</article>

<article class="team-des">
    <h1 class="text-center">Team Members</h1>
    <article class="photo-case">
        <a href="#AnhPhan" class="photo">
            <section class="photo-card">
                <h2 class="photo-title">Anh Phan</h2>
                <p class="photo-des">Lead developer</p>
            </section>
        </a>

        <a href="#HoaThaiPhat" class="photo">
            <section class="photo-card">
                <h2 class="photo-title">Hoa Thai Phat</h2>
                <p class="photo-des">Developer</p>
            </section>
        </a>

        <a href="#FletcherScott" class="photo">
            <section class="photo-card">
                <h2 class="photo-title">Fletcher Scott</h2>
                <p class="photo-des">Developer</p>
            </section>
        </a>

        <a href="#QuinnFriend" class="photo">
            <section class="photo-card">
                <h2 class="photo-title">Quinn Friend</h2>
                <p class="photo-des">Developer</p>
            </section>
        </a>
    </article>
</article>

<article class="team-des">
    <h1 class="text-center">Team Timetable</h1>
    <section class="team-schedule">
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">8:30am</th>
                    <td>COS10004 - Campus</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>COS10026 - Campus</td>
                </tr>
                <tr class="tb-con">
                    <th scope="row">10:30am</th>
                    <td>COS10004 - Campus</td>
                    <td>COS10009 - Live/Campus</td>
                    <td></td>
                    <td></td>
                    <td>COS10026 - Campus</td>
                </tr>
                <tr>
                    <th scope="row">12:30pm</th>
                    <td>COS10026 - Live</td>
                    <td>ART10004 - Campus</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="tb-con">
                    <th scope="row">2:30pm</th>
                    <td>COS10009 - Campus</td>
                    <td></td>
                    <td></td>
                    <td>COS10009 - Campus</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">4:30pm</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>COS10004 - Live</td>
                </tr>
                <tr class="tb-con">
                    <th scope="row">6:30pm</th>
                    <td>ART10004 - Campus</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </section>
</article>

<article class="about_wrapper" id="AnhPhan">
    <img src="./images/AnhPhan.png" alt="Photo of Anh Phan">
    <section class="about_text">
        <dl>
            <dt>Anh Phan</dt>
            <dd>Lead Developer</dd>
            <p>Anh Phan is the lead developer of CashCats. Hailing from Vietnam, he is a first year at Swinburne University of Technology, taking a Bachelor of Computer Science.
                Having previously learned HTML and CSS makes him a valuable member of our team. In his spare time Anh enjoys homework, playing games, sports, travelling, and hanging out with his friends. You can reach Anh at:
                <a href="mailto:104522443@student.swin.edu.au">104522443@student.swin.edu.au</a>
            </p>
        </dl>
    </section>
</article>

<article class="about_wrapper right" id="HoaThaiPhat">
    <img src="./images/ThaiPhat.png" alt="Photo of Hoa Thai Phat">
    <section class="about_text">
        <dl>
            <dt>Hoa Phat Thai</dt>
            <dd>Developer</dd>
            <p>Hoa Phat Thai is one of the developers on the CashCats team. He is currently studying his first year of a Bachelor of Computer Science at Swinburne University after moving here from Vietnam.
                His prior experience in C++ through competetive coding brings a unique perspective to our team. Hoa enjoys the world of sports in his downtime. You can reach Hoa at:
                <a href="mailto:104803588@student.swin.edu.au">104803588@student.swin.edu.au</a>
            </p>
        </dl>
    </section>
</article>

<article class="about_wrapper" id="FletcherScott">
    <img src="./images/FletcherScott.png" alt="Photo of Fletcher Scott">
    <section class="about_text">
        <dl>
            <dt>Fletcher Scott</dt>
            <dd>Developer</dd>
            <p>Fletcher Scott is one of the developers on the CashCats team. Born and raised in Melbourne, Victoria, he is currently a first year at Swinburne University of Technology studying a Bachelor of Computer Science.
                Having prior knowledge of Python, Visual Basic, HTML, and CSS lets him bring an all-round experience to our team. On break, Fletcher enjoys golfing and daytrading. You can reach Fletcher at:
                <a href="mailto:105398849@student.swin.edu.au">105398849@student.swin.edu.au</a>
            </p>
        </dl>
    </section>
</article>

<article class="about_wrapper right" id="QuinnFriend">
    <img src="./images/QuinnFriend.png" alt="Photo of Quinn Friend">
    <section class="about_text">
        <dl>
            <dt>Quinn Friend</dt>
            <dd>Developer</dd>
            <p>Quinn Friend is one of the developers on the CashCats team. From Adelaide, South Australia, she has moved to Melbourne to study a Bachelor of Computer Science at Swinburne University of Technology.
                Her lack of prior experience with programming allows her to bring an open-ness to new concepts to our team. When free Quinn enjoys playing games, both digital and analogue, learning new things and watching shows/movies. You can reach Quinn at:
                <a href="mailto:105374674@student.swin.edu.au">105374674@student.swin.edu.au</a>
            </p>
        </dl>
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
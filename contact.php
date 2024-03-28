<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr" class="no-js" xmlns:mailto="http://www.w3.org/1999/xhtml">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - MamadouAl</title>

    <script>
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/Mad-logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/Mad-logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/Mad-logo.png">
    <link rel="manifest">

</head>


<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- page wrap
    ================================================== -->
    <div id="page" class="s-pagewrap">

        <!-- # site header 
        ================================================== -->
        <header class="s-header">
            <div class="row s-header__inner width-sixteen-col">

                <div class="s-header__block">
                    <div class="s-header__logo">
                        <a class="logo" href="index.html">
                            <p class="logo__text">MamadouAl</p>
                        </a>
                    </div>

                    <a class="s-header__menu-toggle" href="#0"><span>Menu</span></a>
                </div>

                <nav class="s-header__nav">
                    <ul class="s-header__menu-links">
                        <li><a href="index.html#quiSuisJe">Qui suis-je</a></li>
                        <li><a href="index.html#projets">Mes Réalisations</a></li>
                        <li><a href="index.html#formations">Mes Formations</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul> <!-- s-header__menu-links -->

                    <div class="s-header__contact">
                        <a href="contact.php" class="btn btn--primary s-header__contact-btn">Let's Work Together</a>                        
                    </div> <!-- s-header__contact -->
    
                </nav> <!-- end s-header__nav -->

            </div> <!-- end s-header__inner -->
        </header> <!-- end s-header -->


        <!-- # site main content
        ================================================== -->
        <section id="content" class="s-content">

               <section class="s-pageheader pageheader">
                    <div class="row">
                        <div class="column xl-12">
                            <h1 class="page-title">
                                <span class="page-title__small-type text-pretitle">Contact</span>
                                Get In Touch
                            </h1>                            
                        </div>
                    </div>
               </section> <!--pageheader -->

            <section class="s-pagecontent pagecontent">
                <div class="row width-narrower pagemain">
                    <h2>Let's Work Together</h2>
                    <div class="column xl-8 md-12 contact-cta">
                        <p class="lead">
                            Veillez remplir le formulaire ci-dessous pour me contacter. Je vous répondrai dans les plus brefs délais.
                        </p>
                        <form method="post" action="traiteForm.php">
                            <div class="full-width" style="display: flex; flex-direction: column;">
                                <label for="contactName">
                                    <span class="contact-label">Nom</span>
                                </label>
                                <input name="contactName" type="text" id="contactName" class="full-width" placeholder="Your Name" value="" minlength="2" required>
                                <label for="contactEmail">
                                    <span class="contact-label">Email</span>
                                </label><input name="contactEmail" type="email" id="contactEmail" class="full-width" placeholder="Your Email" value="" required>
                                <label for="contactSubject">
                                    <span class="contact-label">Sujet</span>
                                </label><input name="contactSubject" type="text" id="contactSubject" class="full-width" placeholder="Subject" value="">
                                <label id="message" for="contactMessage">
                                    <span class="contact-label">Message</span>
                                </label ><textarea name="contactMessage" id="contactMessage" class="full-width" placeholder="Your Message" required=""></textarea>
                            </div>
                            <button type="submit" class="btn btn--primary u-fullwidth contact-btn">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path>
                                </svg>
                                Envoyer
                            </button>
                        </form>
                        <!-- affichage du message de confirmation -->
                        <?php
                        if (isset($_SESSION['success_message'])) {
                            echo '<div id="message" class="success-message">' . $_SESSION['success_message'] . '</div>';
                            // Supprimer le message de succès de la session après l'avoir affiché une fois
                            unset($_SESSION['success_message']);
                        }
                        ?>

                    </div>
                    <div class="column xl-4 md-12 u-flexitem-x-right">
                        <div class="contact-block">
                            <h6>Follow On Social</h6>
                            <ul class="contact-social social-list">
                                <li>
                                    <a href="https://www.linkedin.com/in/mamadou-aliou-dial/">
                                        <img src="images/LinkedIn_icon.svg.webp" alt="Linkedin" style="width: 35px; height: 35px;">
                                        <span class="u-screen-reader-text">Linkedin</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://github.com/MamadouAl">
                                        <img src="images/GitHub-logo.png" alt="Github" style="width: 35px; height: 35px; background-color: white">
                                        <span class="u-screen-reader-text">Github</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-block">
                            <h6>Email</h6>
                            <a href="mailto:mamadou-aliou.diallo@etu.univ-lehavre.fr">mamadou-aliou.diallo@etu.univ-lehavre.fr</a>
                        </div>
                        <div class="contact-block">
                            <h6>Phone</h6>
                            <ul class="contact-list">
                                <li><a href="tel:+33763071816">(+33)7 63 07 18 16</a></li>
                            </ul>
                        </div>
                        <div class="contact-block">
                            <h6>Address</h6>
                            France
                        </div>
                    </div>
                </div> <!-- end pagemain -->
            </section> <!-- pagecontent -->

        <!-- # footer 
        ================================================== -->
        <footer class="s-footer">

            <div class="row s-footer__bottom">
                <div class="column xl-4 lg-6 md-12 s-footer__block s-footer__about">
                    <h3>About MamadouAl</h3>
                    <p> Developpeur web passionné. </p>
                </div>
                <div class="column xl-4 lg-12">
                    <p class="ss-copyright">
                        <span>© Copyright MamadouAl 2024</span>
                    </p>
                </div>
                <div class="column xl-4 lg-12">
                    <ul class="s-about__social social-list">
                        <!-- Linkedin -->
                        <li>
                            <a href="https://www.linkedin.com/in/mamadou-aliou-dial/">
                                <img src="images/LinkedIn_icon.svg.webp" alt="Linkedin" style="width: 35px; height: 35px;">
                                <span class="u-screen-reader-text">Linkedin</span>
                            </a>
                        </li>
                        <!-- Github -->
                        <li>
                            <a href="https://github.com/MamadouAl">
                                <img src="images/GitHub-logo.png" alt="Github" style="width: 35px; height: 35px; background-color: white">
                                <span class="u-screen-reader-text">Gitthub</span>
                            </a>
                        </li>
                    </ul> <!-- end s-footer__social -->
                </div>


                <div class="ss-go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">&lt;!--!  Atomicons Free 1.00 by @atisalab License - https://atomicons.com/license/ (Icons: CC BY 4.0) Copyright 2021 Atomicons --&gt;<polyline points="17 11 12 6 7 11"></polyline><line x1="12" y1="18" x2="12" y2="6"></line></svg>
                    </a>
                </div> <!-- end ss-go-top -->
            </div>

        </footer> <!-- end s-footer -->

    </div> <!-- end page-wrap -->

    <!-- Java Script
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
<?php

class MonPortefolio {

    /**
     * Methode permettant de générer le début d'un fichier HTML
     * @param string $title
     * @return string
     */
    public static function getDebutHTML(string $title): string {
        return '<!DOCTYPE html>
        <html lang=\"fr\">
        <head>
            <meta charset=\"UTF-8\">
            <title>'.$title.'</title>
            <link rel=\"stylesheet\" href=\"style.css\">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        </head>
        <body> ';
    }

    /**
     * Methode permettant de générer la fin d'un fichier HTML
     * @return string
     */
    public static function getFinHTML(): string {
        return '</div>
            <div class="column is-2">
            </div> </div> </body> </html>';
    }

    /**
     * Methode permettant générer une page d'erreur
     * @param string $message
     * @param string $urlLien
     * @return string
     */
    public static function getPageErreur(string $message, string $urlLien ) : string {
        return self::getDebutHTML("Page d'erreur") .
            "<div>
                <h1>Erreur</h1>
                <p>$message</p>
                <a href=\"$urlLien\">Retour</a>
            </div>" .
            self::getFinHTML();
    }

    public static function getBaniere() : string {
        return '
    <section >
        <div class="columns">
            <div class="column is-12">
                <img src="./images/baniere.png" alt="logo" ">
            </div>
        </div>
    </section>
    <div class="columns">
        <div class="column is-2">
        </div>
        <div class="column is-8">';
    }


    public static function monMenu()
    {
        ?>
        <header>
        <nav class="navbar has-background is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="github.com/MamadouAL/">
                    <img src="./images/Logo_mad.png" width="80" height="100">
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item"> Qui suis-je </a>
                    <a href="#competences" class="navbar-item"> Mes Compétences </a>
                    <a href="#realisations" class="navbar-item"> Mes Réalisations </a>
                    <a href="#formations" class="navbar-item"> Mes Formations </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"> Langues </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item"> Français </a>
                            <a class="navbar-item"> English </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="contact.php" class="button is-primary"> <strong>Contact</strong>  </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav> </header>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
                if ($navbarBurgers.length > 0) {
                    $navbarBurgers.forEach( el => {
                        el.addEventListener('click', () => {
                            // Get the target from the "data-target" attribute
                            const target = el.dataset.target;
                            const $target = document.getElementById(target);
                            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                            el.classList.toggle('is-active');
                            $target.classList.toggle('is-active');
                        });
                    });
                }
            });
        </script>
        <?php
    }

    /*Contenu du portfolio*/

    public static function jeSuis() : string{
        return '
        <div id="presentation">
            <h2 class="title is-2" id="formations">Présentation</h2>
            <div class="card">
            <p>Je m\'appelle Mamadou Aliou Diallo et je suis actuellement étudiant en Licence 3 Informatique à l’Université du Havre,
             passionné par le développement logiciel, le web et la sécurité informatique.</p>
             <p>Dans le cadre de ma formation, je suis à la recherche d\'un stage en développement informatique 
             à partir du 08 avril 2024 pour une durée de 2 mois.
             Ce stage se l\'occasion pour moi de mettre en pratique mes connaissances et compétences acquises au cours de ma formation. </p>
        </div>
        </div>';
    }

    public static function getCompetences() : string {
        return '
        <h3 class="title is-3" id="competences">Mes Compétences</h3>
        
        <div class="columns is-multiline is-centered">
            '.self::ajouteCard("HTML", "https://www.w3.org/html/logo/downloads/HTML5_Logo_512.png").'
            '.self::ajouteCard("CSS", "https://img.icons8.com/color/144/000000/css3.png").'
            '.self::ajouteCard("PHP", "./images/php-logo.png").'           
            '.self::ajouteCard("SQL", "https://img.icons8.com/color/144/000000/sql.png").'
            '.self::ajouteCard("PostgreSQL", "https://img.icons8.com/color/144/000000/postgreesql.png").'
            '.self::ajouteCard("MySQL", "https://img.icons8.com/color/144/000000/mysql.png").'
            '.self::ajouteCard("Git", "https://img.icons8.com/color/144/000000/git.png").'
            '.self::ajouteCard("Symfony", "https://img.icons8.com/color/144/000000/symfony.png").'  
            '.self::ajouteCard("C", "https://img.icons8.com/color/144/000000/c-programming.png").'
            '.self::ajouteCard("Bulma", "./images/Bulma Logo.png").'
        </div>';
    }

    private static function ajouteCard(string $title, string $imageSrc) : string {
        return '
        <div class="column is-one-quarter-desktop is-one-third-mobile">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <figure class="image is-64x64">
                            <img src="'.$imageSrc.'" alt="'.$title.'" width="100" height="120">
                        </figure>
                    </div>
                </div>
            </div>
        </div>';
    }

    //Mes formations


    public static function renderFooter() {
        ?>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>© Copyright 2024 - Diallo Mamadou Aliou</p>
                <p><a href="mailto:mamadou-aliou.diallo@etu.univ-lehavre.fr">Em@il: mamadou-alIou.diallo@etu.univ-lehavre.fr</a></p>
                <p><a href="tel:+337 63 07 18 16">Tél: +337 63 07 18 16</a></p>
                <p>
                    <a href="github.com/MamadouAL/">
                        <i>made by </i>
                        <img src="./images/Logo_mad.png" alt="Mad Al" title="Baniere" width="50" height="50">
                    </a>
                </p>
            </div>
        </footer>
        <?php
    }

}
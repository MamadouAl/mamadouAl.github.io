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
        return '
        </div> <!-- Fin de la div container -->
        </div> </body> </html>';
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
    <div class="container">
       ';
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

    public static function jeSuis() : string {
        return '
    <div class="container mx-3 mb-2">
    <div id="presentation">
        <h2 class="title is-2 has-background-dark has-text-white-ter" id="formations">Présentation</h2>
        <div class="card">
            <div class="content is-centered">
                <p class="is-size-5 is-size-7-mobile">
                Je m\'appelle Mamadou Aliou Diallo et je suis actuellement étudiant en Licence 3 Informatique à l’Université du Havre,
                passionné par le développement logiciel, le web et la sécurité informatique.</br>
                Dans le cadre de ma formation, je suis à la recherche d\'un stage en développement informatique 
                à partir du 08 avril 2024 pour une durée de 2 mois.
                Ce stage se l\'occasion pour moi de mettre en pratique mes connaissances et compétences acquises au cours de ma formation. </p>
            </div>
        </div>
    </div>';
    }



    public static function getCompetences() : string {
        return '
    <h2 class="title is-2 has-background-dark has-text-white-ter
    id="competences">Mes Compétences</h2>
    
    <div class="columns is-multiline ">
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

    public static function getRealisations0() : string {
        return '
    <h3 class="title is-3" id="realisations">Mes Réalisations</h3>
    <div class="columns is-multiline">
        <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="./images/ecommerce.png" alt="Ecommerce">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4 class="title is-4">Site eCommerce</h4>
                        <p>Site web eCommerce réalisé en HTML, CSS et PHP avec une base de données PostgreSQL</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="./images/entreprise.png" alt="Entreprise">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4 class="title is-4">Vitrine pour une entreprise</h4>
                        <p>Site web vitrine pour une entreprise réalisé en HTML, CSS et PHP</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="./images/nfc.png" alt="NFC">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4 class="title is-4">Application NFCReader</h4>
                        <p>Application de lecture de carte NFC réalisée en Java avec Android Studio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    }

    private static function ajouteCard(string $title, string $imageSrc) : string {
        return '
    <div class="column is-6 is-one-fifth-desktop">
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="'.$imageSrc.'" alt="'.$title.'">
                </figure>
            </div>
        </div>
    </div>
    ';
    }
    public static function getRealisations() : string {
        return '
    <h3 class="title is-2 has-background-dark has-text-white-ter" id="realisations">Mes Réalisations</h3>
    <div class="columns is-multiline">
        '.self::ajouteRealisationCard("Site eCommerce", ["./images/ecommerce.png", "./images/ecommerce2.png", "./images/ecommerce3.png"], "https://pathetransport.fr/").'
        '.self::ajouteRealisationCard("Vitrine pour une entreprise", ["./images/pathe1.png", "./images/pathe2.png", "./images/pathe3.png"], "https://pathetransport.fr/").'
    </div>';
}

private static function ajouteRealisationCard(string $title, array $images, $lien='#') : string {
    return '
    <div class="column is-12 is-one-third-desktop">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">' . $title . '</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="carousel">
                        <div class="carousel-container">
                            <div class="carousel-item">
                                <img src="' . $images[0] . '" alt="' . $title . ' Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="' . $images[1] . '" alt="' . $title . ' Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="' . $images[2] . '" alt="' . $title . ' Image 3">
                            </div>
                        </div>
                        <div class="carousel-navigation">
                            <div class="carousel-nav-left">
                                <span class="icon">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            </div>
                            <div class="carousel-nav-right">
                                <span class="icon">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <a href="'.$lien.'" class="card-footer-item">Voir le projet</a>
            </footer>
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
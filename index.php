<?php
include_once 'MonPortefolio.php';

echo MonPortefolio::getDebutHTML("Mon portefolio");

MonPortefolio::monMenu();
echo MonPortefolio::getBaniere();
echo MonPortefolio::jeSuis();
echo MonPortefolio::getCompetences();
echo MonPortefolio::getRealisations();
 MonPortefolio::renderFooter();

echo MonPortefolio::getFinHTML();
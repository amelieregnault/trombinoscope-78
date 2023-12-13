<?php

// Récupération des données
include 'database.php';
$page_title = 'Trombinoscope';
$css = 'style1.css';

// Génération et injection de la vue
ob_start();
include 'app/view/trombi.view.php';
$content = ob_get_clean();

// Inclusion du layout pour obtenir la page HTML
include 'app/view/common/layout.php';

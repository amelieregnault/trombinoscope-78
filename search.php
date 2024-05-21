<?php

session_start();

// Récupération des données
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

require_once 'app/model/connexionBDD.php';
require_once 'app/model/trombi.model.php';

$students = [];
$search = $_GET['search']??'';

$students = searchStudents(getDatabaseConnection(), $_GET['search']);

$page_title = "Trombinoscope - Recherche";

// Chargement de la vue
ob_start();
include 'app/view/trombi.view.php';
$content = ob_get_clean();

// Génération de la page HTML à partir du Layout
include 'app/view/common/layout.php';


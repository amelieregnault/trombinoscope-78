<?php
session_start();

// 1 - Récupérer, calculer ou déclarer les données

if (empty($_GET['num']) || !ctype_digit($_GET['num']) || $_GET['num'] < 1) {
    $_SESSION['message'] = "L'identifiant de l'étudiant n'est pas correct.";
    header('Location: trombinoscope.php');
    exit;
}

$numStudent = intval($_GET['num']);

require_once 'app/model/connexionBDD.php';
require_once 'app/model/trombi.model.php';
$student = getStudent($numStudent, getDatabaseConnection());


$page_title = 'Trombinoscope - ' . $student['firstname']  . ' ' . $student['lastname'];

// 2 - Construire la vue et l'injecter dans la variable $content
ob_start();
include 'app/view/fiche.view.php';
$content = ob_get_clean();

// 3 - Génération du code HTML de la page à partir du layout
include 'app/view/common/layout.php';
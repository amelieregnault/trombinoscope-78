<?php

function getStudent(int $numStudent, PDO $pdo): array
{
    $sql = "SELECT * FROM students WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $numStudent, PDO::PARAM_INT);
    $stmt->execute();

    if (!$student = $stmt->fetch()) {
        $_SESSION['message'] = "L'étudiant n'existe pas !";
        header('Location: trombinoscope.php');
        exit;
    }
    return $student;
}

function getAllStudents(PDO $pdo) 
{
    $sql = "SELECT * FROM students";
    $stmt = $pdo->query($sql);
    $students = $stmt->fetchAll();
    return $students;
}

function getStudentsByPage(PDO $pdo, int $numPage): array
{
    $nbStudentsPerPage = 16;
    $offset = ($numPage - 1) * $nbStudentsPerPage;
    $sql = "SELECT * FROM students LIMIT " . $nbStudentsPerPage .  " OFFSET " . $offset;
    $stmt = $pdo->query($sql);
    $students = $stmt->fetchAll();
    return $students;
}

function searchStudents(PDO $pdo, string $search) {
    $searchWithWildCards = '%' . $search . '%';
    $sql = "SELECT * FROM students WHERE firstname LIKE :search OR lastname LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":search", $searchWithWildCards);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getNbPages(PDO $pdo): int
{
    $sql = "SELECT count(*) FROM students";
    $stmt = $pdo->query($sql);
    $nbStudents = $stmt->fetchColumn();
    $nbStudentsPerPage = 16;
    return ceil($nbStudents / $nbStudentsPerPage);
}

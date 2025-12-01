<?php
require_once "../includes/database.php";

$jaar = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jaar = trim($_POST['jaar']);

    if ($jaar === '') $errors[] = "Jaar is verplicht.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO boekjaar (jaar) VALUES (:jaar)");
            $stmt->execute([':jaar' => $jaar]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Fout bij opslaan: " . $e->getMessage();
        }
    }
}
?>

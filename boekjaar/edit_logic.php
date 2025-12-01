<?php
require_once "../includes/database.php";

if (!isset($_GET['id'])) die("Geen ID opgegeven.");
$id = $_GET['id'];
$errors = [];

try {
    $stmt = $pdo->prepare("SELECT * FROM boekjaar WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $boekjaar = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$boekjaar) die("Boekjaar niet gevonden.");

    $jaar = $boekjaar['jaar'];
} catch (PDOException $e) {
    die("Fout bij ophalen: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jaar = trim($_POST['jaar']);
    if ($jaar === '') $errors[] = "Jaar is verplicht.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("UPDATE boekjaar SET jaar = :jaar WHERE id = :id");
            $stmt->execute([':jaar' => $jaar, ':id' => $id]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Fout bij opslaan: " . $e->getMessage();
        }
    }
}
?>

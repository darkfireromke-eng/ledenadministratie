<?php
require_once "../includes/database.php";

$errors = [];
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Geen ID opgegeven.");
}


try {
    $stmt = $pdo->prepare("SELECT * FROM familie WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $familie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$familie) {
        die("Familie niet gevonden.");
    }
} catch (PDOException $e) {
    die("Fout bij ophalen: " . $e->getMessage());
}

$naam = $familie['naam'];
$adres = $familie['adres'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = trim($_POST['naam']);
    $adres = trim($_POST['adres']);

    if (empty($naam)) $errors[] = "Naam is verplicht.";
    if (empty($adres)) $errors[] = "Adres is verplicht.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
                UPDATE familie
                SET naam = :naam, adres = :adres
                WHERE id = :id
            ");

            $stmt->execute([
                ':naam' => $naam,
                ':adres' => $adres,
                ':id'   => $id
            ]);

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Fout bij bijwerken: " . $e->getMessage();
        }
    }
}
?>

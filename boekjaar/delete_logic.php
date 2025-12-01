<?php
require_once "../includes/database.php";

if (!isset($_GET['id'])) die("Geen ID opgegeven.");
$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM boekjaar WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $boekjaar = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$boekjaar) die("Boekjaar niet gevonden.");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("DELETE FROM boekjaar WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: index.php");
        exit;
    }
} catch (PDOException $e) {
    die("Fout bij verwijderen: " . $e->getMessage());
}
?>

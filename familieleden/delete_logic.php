<?php
require_once "../includes/database.php";

// Controleer of er een ID is meegegeven
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Geen ID opgegeven.");
}

$id = $_GET['id'];

// Stap 1: familielid ophalen
try {
    $stmt = $pdo->prepare("
        SELECT f.*, 
               fam.naam AS familie_naam,
               s.naam AS soort_lid_naam
        FROM familieleden f
        LEFT JOIN families fam ON f.familie_id = fam.id
        LEFT JOIN soort_lid s ON f.soort_lid_id = s.id
        WHERE f.id = :id
    ");
    $stmt->execute([':id' => $id]);
    $lid = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$lid) {
        die("Familielid niet gevonden.");
    }

} catch (PDOException $e) {
    die("Fout bij ophalen familielid: " . $e->getMessage());
}

// Stap 2: Wanneer gebruiker bevestigt, verwijderen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {

    try {
        $stmt = $pdo->prepare("DELETE FROM familieleden WHERE id = :id");
        $stmt->execute([':id' => $id]);

        header("Location: index.php");
        exit;

    } catch (PDOException $e) {
        die("Fout bij verwijderen: " . $e->getMessage());
    }
}
?>

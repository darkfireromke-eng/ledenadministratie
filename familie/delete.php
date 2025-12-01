<?php
require_once "../includes/database.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Geen ID opgegeven.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("DELETE FROM familie WHERE id = :id");
        $stmt->execute([':id' => $id]);

        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        die("Fout bij verwijderen: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Familie verwijderen</title>
</head>
<body>

<h1>Familie verwijderen</h1>
<p>Weet je zeker dat je deze familie wilt verwijderen?</p>

<form method="post">
    <button type="submit">Ja, verwijderen</button>
</form>

<p><a href="index.php">Annuleren</a></p>

</body>
</html>

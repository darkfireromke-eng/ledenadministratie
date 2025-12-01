<?php
require_once "../includes/database.php";

try {
    $stmt = $pdo->query("SELECT * FROM boekjaar ORDER BY jaar DESC");
    $boekjaren = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Fout bij ophalen boekjaren: " . $e->getMessage());
}
?>

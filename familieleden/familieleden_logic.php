<?php
require_once "../includes/database.php";

try {
    $stmt = $pdo->query("
        SELECT f.id, f.naam, f.geboortedatum, f.familie_id,
               s.lidsoort AS soort_lid_naam,
               fam.naam AS familie_naam
        FROM familieleden f
        LEFT JOIN soort_lid s ON f.soort_lid_id = s.id
        LEFT JOIN familie fam ON f.familie_id = fam.id
    ");
    $leden = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Fout bij ophalen familieleden: " . $e->getMessage());
}
?>

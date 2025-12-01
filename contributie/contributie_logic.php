<?php
require_once "../includes/database.php";

// Functie voor automatische berekening (optioneel tonen in overzicht)
function berekenContributie($leeftijd, $soort_lid) {
    $basis = 100;
    $korting = 0;

    switch ($soort_lid) {
        case 'Jeugd':
            if ($leeftijd < 8) $korting = 50;
            break;
        case 'Aspirant':
            if ($leeftijd >= 8 && $leeftijd <= 12) $korting = 40;
            break;
        case 'Junior':
            if ($leeftijd >= 13 && $leeftijd <= 17) $korting = 25;
            break;
        case 'Senior':
            if ($leeftijd >= 18 && $leeftijd <= 50) $korting = 0;
            break;
        case 'Oudere':
            if ($leeftijd >= 51) $korting = 45;
            break;
    }

    return round($basis * (1 - $korting / 100), 2);
}

try {
    // Alle contributies ophalen met soort lid en boekjaar
    $stmt = $pdo->query("
        SELECT c.id, c.leeftijd, c.soort_lid, c.bedrag, b.jaar 
        FROM contributie c
        LEFT JOIN boekjaar b ON c.boekjaar_id = b.id
        ORDER BY b.jaar DESC, c.soort_lid ASC
    ");
    $regels = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Fout bij ophalen contributies: " . $e->getMessage());
}
?>

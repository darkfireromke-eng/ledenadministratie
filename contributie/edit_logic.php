<?php
require_once "../includes/database.php";

// Functie voor automatische berekening
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

if (!isset($_GET['id'])) {
    die("Geen ID opgegeven.");
}

$id = $_GET['id'];
$errors = [];

// Ophalen boekjaren en soorten
$boekjaren = $pdo->query("SELECT * FROM boekjaar ORDER BY jaar DESC")->fetchAll(PDO::FETCH_ASSOC);
$soorten = $pdo->query("SELECT * FROM soort_lid ORDER BY naam ASC")->fetchAll(PDO::FETCH_ASSOC);

// Ophalen bestaande regel
try {
    $stmt = $pdo->prepare("SELECT * FROM contributie WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $contributie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contributie) die("Contributieregel niet gevonden.");

    $leeftijd = $contributie['leeftijd'];
    $soort_lid = $contributie['soort_lid'];
    $bedrag = $contributie['bedrag'];
    $boekjaar_id = $contributie['boekjaar_id'];

} catch (PDOException $e) {
    die("Fout bij ophalen: " . $e->getMessage());
}

// POST: opslaan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $leeftijd = trim($_POST['leeftijd']);
    $soort_lid = trim($_POST['soort_lid']);
    $boekjaar_id = trim($_POST['boekjaar_id']);

    if ($leeftijd === '') $errors[] = "Leeftijd is verplicht.";
    if ($soort_lid === '') $errors[] = "Soort lid is verplicht.";
    if ($boekjaar_id === '') $errors[] = "Boekjaar is verplicht.";

    if (empty($errors)) {
        $bedrag = berekenContributie($leeftijd, $soort_lid);

        try {
            $stmt = $pdo->prepare("
                UPDATE contributie
                SET leeftijd = :leeftijd, soort_lid = :soort_lid, bedrag = :bedrag, boekjaar_id = :boekjaar_id
                WHERE id = :id
            ");
            $stmt->execute([
                ':leeftijd' => $leeftijd,
                ':soort_lid' => $soort_lid,
                ':bedrag' => $bedrag,
                ':boekjaar_id' => $boekjaar_id,
                ':id' => $id
            ]);

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Fout bij opslaan: " . $e->getMessage();
        }
    }
}
?>

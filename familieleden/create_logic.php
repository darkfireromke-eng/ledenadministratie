<?php
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../soort_lid/soort_lid_logic.php";
require_once __DIR__ . "/../familie/familie_logic.php";

// Dropdown-data ophalen
$families = getAllFamilies();
$soortLeden = getAllSoortLid();

// Variabelen voor formulier
$naam = $geboortedatum = $familie_id = $soort_lid_id = "";
$errors = [];

// Form-verwerking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $naam = trim($_POST['naam']);
    $geboortedatum = trim($_POST['geboortedatum']);
    $familie_id = trim($_POST['familie_id']);
    $soort_lid_id = trim($_POST['soort_lid_id']);

    // Basis validatie
    if (empty($naam)) $errors[] = "Naam is verplicht.";
    if (empty($geboortedatum)) $errors[] = "Geboortedatum is verplicht.";
    if (!empty($geboortedatum) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $geboortedatum)) {
        $errors[] = "Geboortedatum moet in het formaat YYYY-MM-DD zijn.";
    }
    if (empty($familie_id)) $errors[] = "Familie is verplicht.";
    if (empty($soort_lid_id)) $errors[] = "Soort lid is verplicht.";

    // Controleren of IDs bestaan
    if (!empty($familie_id) && array_search($familie_id, array_column($families, 'id')) === false) {
        $errors[] = "Geselecteerde familie bestaat niet.";
    }
    if (!empty($soort_lid_id) && array_search($soort_lid_id, array_column($soortLeden, 'id')) === false) {
        $errors[] = "Geselecteerde soort lid bestaat niet.";
    }

    // Alleen opslaan als er geen fouten zijn
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO familieleden (naam, geboortedatum, familie_id, soort_lid_id)
                VALUES (:naam, :geboortedatum, :familie_id, :soort_lid_id)
            ");
            $stmt->execute([
                ':naam' => $naam,
                ':geboortedatum' => $geboortedatum,
                ':familie_id' => $familie_id,
                ':soort_lid_id' => $soort_lid_id
            ]);

            header("Location: index.php");
            exit;

        } catch (PDOException $e) {
            $errors[] = "Fout bij opslaan: " . $e->getMessage();
        }
    }
}
?>

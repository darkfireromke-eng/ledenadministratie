<?php
require_once __DIR__ . "/../includes/database.php";

// Variabelen voor formulier
$naam = "";
$adres = "";
$errors = [];

// Functie om alle families op te halen
function getAllFamilies() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM familie ORDER BY naam ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Fout bij ophalen van families: " . $e->getMessage());
    }
}

// Families ophalen voor gebruik in select-menu
$families = getAllFamilies();

// POST-verwerking bij toevoegen van een nieuwe familie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = trim($_POST['naam']);
    $adres = trim($_POST['adres']);

    if (empty($naam)) $errors[] = "Naam is verplicht.";
    if (empty($adres)) $errors[] = "Adres is verplicht.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO familie (naam, adres) VALUES (:naam, :adres)");
            $stmt->execute([
                ':naam' => $naam,
                ':adres' => $adres
            ]);

            // Na succesvol opslaan redirect naar overzicht
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Fout bij toevoegen van familie: " . $e->getMessage();
        }
    }
}
?>

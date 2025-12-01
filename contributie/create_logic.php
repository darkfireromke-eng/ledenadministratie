<?php
require_once "../includes/database.php";

$leeftijd = "";
$soort_lid = "";
$bedrag = "";
$boekjaar_id = "";
$errors = [];

// Ophalen boekjaren en soort_lid-opties voor het formulier
$boekjaren = $pdo->query("SELECT * FROM boekjaar ORDER BY jaar DESC")->fetchAll(PDO::FETCH_ASSOC);
$soorten = $pdo->query("SELECT * FROM soort_lid ORDER BY naam ASC")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $leeftijd = trim($_POST['leeftijd']);
    $soort_lid = trim($_POST['soort_lid']);
    $bedrag = trim($_POST['bedrag']);
    $boekjaar_id = trim($_POST['boekjaar_id']);

    // Validatie
    if ($leeftijd === '') $errors[] = "Leeftijd is verplicht.";
    if ($soort_lid === '') $errors[] = "Soort lid is verplicht.";
    if ($bedrag === '') $errors[] = "Bedrag is verplicht.";
    if ($boekjaar_id === '') $errors[] = "Boekjaar is verplicht.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO contributie (leeftijd, soort_lid, bedrag, boekjaar_id)
                VALUES (:leeftijd, :soort_lid, :bedrag, :boekjaar_id)
            ");
            $stmt->execute([
                ':leeftijd' => $leeftijd,
                ':soort_lid' => $soort_lid,
                ':bedrag' => $bedrag,
                ':boekjaar_id' => $boekjaar_id
            ]);

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Fout bij opslaan: " . $e->getMessage();
        }
    }
}
?>

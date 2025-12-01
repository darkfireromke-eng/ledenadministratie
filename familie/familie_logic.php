<?php
require_once __DIR__ . "/../includes/database.php";

// Alles ophalen
function getAllFamilies() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM familie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Fout bij ophalen van families: " . $e->getMessage());
    }
}

// Eén familie ophalen
function getFamily($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM familie WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Toevoegen
function createFamily($naam, $adres) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO familie (naam, adres) VALUES (?, ?)");
    return $stmt->execute([$naam, $adres]);
}

// Bewerken
function updateFamily($id, $naam, $adres) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE familie SET naam = ?, adres = ? WHERE id = ?");
    return $stmt->execute([$naam, $adres, $id]);
}

// Verwijderen
function deleteFamily($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM familie WHERE id = ?");
    return $stmt->execute([$id]);
}
?>

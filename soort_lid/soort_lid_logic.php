<?php
require_once "../includes/database.php";

// Alle lidsoorten ophalen
function getAllSoortLid() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id, lidsoort, korting FROM soort_lid ORDER BY lidsoort ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Eén lidsoort ophalen
function getSoortLid($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id, lidsoort, korting FROM soort_lid WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Lidsoort toevoegen
function createSoortLid($lidsoort, $korting) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO soort_lid (lidsoort, korting) VALUES (?, ?)");
    return $stmt->execute([$lidsoort, $korting]);
}

// Lidsoort bewerken
function updateSoortLid($id, $lidsoort, $korting) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE soort_lid SET lidsoort = ?, korting = ? WHERE id = ?");
    return $stmt->execute([$lidsoort, $korting, $id]);
}

// Lidsoort verwijderen
function deleteSoortLid($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM soort_lid WHERE id = ?");
    return $stmt->execute([$id]);
}
?>

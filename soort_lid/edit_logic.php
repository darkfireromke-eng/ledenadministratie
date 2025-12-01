<?php
require_once "soort_lid_logic.php";

$id = $_GET["id"];
$soort = getSoortLid($id);
$error = "";

if (!$soort) {
    die("Lidsoort bestaat niet.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam = trim($_POST["naam"]);

    if ($naam === "") {
        $error = "Naam mag niet leeg zijn.";
    } else {
        updateSoortLid($id, $naam);
        header("Location: index.php");
        exit;
    }
}
?>

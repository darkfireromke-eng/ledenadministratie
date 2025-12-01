<?php
require_once "soort_lid_logic.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam = trim($_POST["naam"]);

    if ($naam === "") {
        $error = "Naam mag niet leeg zijn.";
    } else {
        createSoortLid($naam);
        header("Location: index.php");
        exit;
    }
}
?>

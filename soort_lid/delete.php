<?php
require_once "soort_lid_logic.php";

$id = $_GET["id"];
deleteSoortLid($id);

header("Location: index.php");
exit;
?>

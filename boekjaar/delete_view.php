<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boekjaar verwijderen</title>
</head>
<body>
<?php require_once "../includes/navigatie.php"; ?>

<h1>Boekjaar verwijderen</h1>

<p>Weet je zeker dat je het boekjaar <?= htmlspecialchars($boekjaar['jaar']) ?> wilt verwijderen?</p>

<form method="post">
    <button type="submit">Ja, verwijderen</button>
</form>

<p><a href="index.php">Annuleren</a></p>

</body>
</html>

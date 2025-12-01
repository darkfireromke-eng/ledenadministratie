<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Contributie verwijderen</title>
</head>
<body>

<h1>Contributieregel verwijderen</h1>

<p>Weet je zeker dat je deze contributieregel wilt verwijderen?</p>
<ul>
    <li>Leeftijd: <?= htmlspecialchars($contributie['leeftijd']) ?></li>
    <li>Soort lid: <?= htmlspecialchars($contributie['soort_lid']) ?></li>
    <li>Bedrag: €<?= htmlspecialchars($contributie['bedrag']) ?></li>
</ul>

<form method="post">
    <button type="submit">Ja, verwijderen</button>
</form>

<p><a href="index.php">Annuleren</a></p>

</body>
</html>

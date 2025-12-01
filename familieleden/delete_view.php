<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Familielid verwijderen</title>
</head>
<body>

<?php include_once "../includes/navigation.php"; ?>

<h1>Familielid verwijderen</h1>

<?php if (!empty($lid)): ?>

    <p>Weet je zeker dat je dit familielid wilt verwijderen?</p>

    <p>
        <strong><?= htmlspecialchars($lid['voornaam'] . ' ' . $lid['achternaam']); ?></strong><br>
        Geboortedatum: <?= htmlspecialchars($lid['geboortedatum']); ?><br>
        Familie: <?= htmlspecialchars($lid['familie_naam']); ?><br>
        Soort lid: <?= htmlspecialchars($lid['soort_lid_naam']); ?>
    </p>

    <form method="POST">
        <button type="submit" name="confirm" value="yes">Ja, verwijderen</button>
        <a href="index.php">Nee, terug</a>
    </form>

<?php else: ?>

    <p>Geen familielid gevonden.</p>
    <p><a href="index.php">Terug</a></p>

<?php endif; ?>

</body>
</html>

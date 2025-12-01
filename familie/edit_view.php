<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Familie bewerken</title>
</head>
<body>

<?php include_once "../includes/navigation.php"; ?>

<h1>Familie bewerken</h1>

<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $err): ?>
            <li><?= htmlspecialchars($err); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST">

    <label>Naam:<br>
        <input type="text" name="naam" value="<?= htmlspecialchars($familie['naam']); ?>">
    </label><br><br>

    <label>Adres:<br>
        <input type="text" name="adres" value="<?= htmlspecialchars($familie['adres']); ?>">
    </label><br><br>

    <button type="submit">Wijzigingen opslaan</button>
</form>

</body>
</html>

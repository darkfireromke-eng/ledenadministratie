<?php
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/familie_logic.php"; // Verbindt de logic voor POST-verwerking en variabelen
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Familie toevoegen</title>
</head>
<body>

<?php include_once "../includes/navigation.php"; ?>

<h1>Familie toevoegen</h1>

<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $err): ?>
            <li><?= htmlspecialchars($err); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST">
    <label>Naam:<br>
        <input type="text" name="naam" value="<?= htmlspecialchars($naam); ?>">
    </label><br><br>

    <label>Adres:<br>
        <input type="text" name="adres" value="<?= htmlspecialchars($adres); ?>">
    </label><br><br>

    <button type="submit">Opslaan</button>
</form>

</body>
</html>

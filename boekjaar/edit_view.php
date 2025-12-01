<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boekjaar bewerken</title>
</head>
<body>
<?php require_once "../includes/navigatie.php"; ?>

<h1>Boekjaar bewerken</h1>

<?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= $err ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post">
    <label for="jaar">Jaar:</label><br>
    <input type="number" name="jaar" id="jaar" value="<?= htmlspecialchars($jaar) ?>"><br><br>

    <button type="submit">Opslaan</button>
</form>

<p><a href="index.php">← Terug</a></p>

</body>
</html>

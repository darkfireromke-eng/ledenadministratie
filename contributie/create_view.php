<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe contributie toevoegen</title>
</head>
<body>

<h1>Nieuwe contributieregel toevoegen</h1>

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
    <label for="leeftijd">Leeftijd:</label><br>
    <input type="number" name="leeftijd" id="leeftijd" value="<?= htmlspecialchars($leeftijd) ?>"><br><br>

    <label for="soort_lid">Soort lid:</label><br>
    <select name="soort_lid" id="soort_lid">
        <option value="">-- Kies soort lid --</option>
        <?php foreach ($soorten as $s): ?>
            <option value="<?= htmlspecialchars($s['naam']) ?>" <?= $soort_lid == $s['naam'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($s['naam']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="boekjaar_id">Boekjaar:</label><br>
    <select name="boekjaar_id" id="boekjaar_id">
        <option value="">-- Kies boekjaar --</option>
        <?php foreach ($boekjaren as $b): ?>
            <option value="<?= $b['id'] ?>" <?= $boekjaar_id == $b['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($b['jaar']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <p>Bedrag (automatisch berekend): €<?= isset($bedrag) ? $bedrag : '0,00' ?></p>

    <button type="submit">Opslaan</button>
</form>

<p><a href="index.php">← Terug</a></p>

</body>
</html>

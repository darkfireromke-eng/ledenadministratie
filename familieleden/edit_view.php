<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Lid bewerken</title>
</head>
<body>

<?php require_once __DIR__ . "/../includes/navigation.php"; ?>

<h1>Lid bewerken</h1>

<?php if (!empty($errors)): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="edit.php?id=<?= $lid['id']; ?>" method="post">
    <label>Naam:
        <input type="text" name="naam" value="<?= htmlspecialchars($lid['naam']); ?>">
    </label>
    <br><br>
    <label>Geboortedatum:
        <input type="date" name="geboortedatum" value="<?= htmlspecialchars($lid['geboortedatum']); ?>">
    </label>
    <br><br>
    <label>Familie:
        <select name="familie_id">
            <?php foreach ($families as $f): ?>
                <option value="<?= $f['id']; ?>" <?= ($f['id'] == $lid['familie_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($f['naam']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <br><br>
    <label>Soort lid:
        <select name="soort_lid_id">
            <?php foreach ($soorten as $s): ?>
                <option value="<?= $s['id']; ?>" <?= ($s['id'] == $lid['soort_lid_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($s['lidsoort']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <br><br>
    <button type="submit">Opslaan</button>
</form>

</body>
</html>

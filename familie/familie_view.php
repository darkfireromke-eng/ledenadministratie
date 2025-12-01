<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Families</title>
    <style>
        table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>


<h1>Overzicht Families</h1>
<?php require_once "../includes/navigation.php"; ?>

<p><a href="create.php">Nieuwe familie toevoegen</a></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Acties</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($families)): ?>
        <?php foreach ($families as $familie): ?>
            <tr>
                <td><?= $familie['id']; ?></td>
                <td><?= htmlspecialchars($familie['naam']); ?></td>
                <td><?= htmlspecialchars($familie['adres']); ?></td>
                <td>
                    <a href="edit.php?id=<?= $familie['id']; ?>">Bewerken</a> |
                    <a href="delete.php?id=<?= $familie['id']; ?>">Verwijderen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="4">Geen families gevonden.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>

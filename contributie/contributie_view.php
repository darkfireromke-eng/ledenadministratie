<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Contributies</title>
    <style>
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>

<h1>Overzicht Contributies</h1>

<p><a href="create.php">Nieuwe contributie toevoegen</a></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Leeftijd</th>
            <th>Soort lid</th>
            <th>Bedrag</th>
            <th>Boekjaar</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($regels)): ?>
            <?php foreach ($regels as $r): ?>
                <tr>
                    <td><?= $r['id']; ?></td>
                    <td><?= htmlspecialchars($r['leeftijd']); ?></td>
                    <td><?= htmlspecialchars($r['soort_lid']); ?></td>
                    <td>€<?= htmlspecialchars($r['bedrag']); ?></td>
                    <td><?= htmlspecialchars($r['jaar']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $r['id']; ?>">Bewerk</a> |
                        <a href="delete.php?id=<?= $r['id']; ?>">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Geen contributies gevonden.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>

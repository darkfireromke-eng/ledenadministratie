<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Familieleden</title>
    <style>
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>

<?php require_once "../includes/navigation.php"; ?>

<h1>Overzicht Familieleden</h1>

<p><a href="create.php">Nieuw familielid toevoegen</a></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Geboortedatum</th>
            <th>Familie</th>
            <th>Soort lid</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($leden)): ?>
            <?php foreach ($leden as $lid): ?>
                <tr>
                    <td><?= $lid['id']; ?></td>
                    <td><?= htmlspecialchars($lid['naam']); ?></td>
                    <td><?= htmlspecialchars($lid['geboortedatum']); ?></td>
                    <td><?= htmlspecialchars($lid['familie_naam']); ?></td>
                    <td><?= htmlspecialchars($lid['soort_lid_naam']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $lid['id']; ?>">Bewerken</a> |
                        <a href="delete.php?id=<?= $lid['id']; ?>" 
                           onclick="return confirm('Weet je zeker dat je dit familielid wilt verwijderen?');">
                           Verwijderen
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Geen familieleden gevonden.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>

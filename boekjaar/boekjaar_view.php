<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Boekjaren</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
<?php require_once "../includes/navigation.php"; ?>

<h1>Boekjaren</h1>

<p><a href="create.php">Nieuw boekjaar toevoegen</a></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Jaar</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($boekjaren) > 0): ?>
            <?php foreach ($boekjaren as $b): ?>
                <tr>
                    <td><?= $b['id'] ?></td>
                    <td><?= htmlspecialchars($b['jaar']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $b['id'] ?>">Bewerk</a> |
                        <a href="delete.php?id=<?= $b['id'] ?>">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Geen boekjaren gevonden.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>

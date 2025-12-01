<?php include_once "../includes/navigation.php"; ?>

<h1>Lidsoorten</h1>

<p><a href="create.php">Nieuwe lidsoort toevoegen</a></p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Acties</th>
    </tr>

    <?php foreach ($lidsoorten as $soort): ?>
        <tr>
            <td><?= $soort['id'] ?></td>
            <td><?= htmlspecialchars($soort['naam']) ?></td>
            <td>
                <a href="edit.php?id=<?= $soort['id'] ?>">Bewerken</a> |
                <a href="delete.php?id=<?= $soort['id'] ?>">Verwijderen</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

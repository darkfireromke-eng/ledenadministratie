<?php include_once "../includes/navigation.php"; ?>

<h1>Lidsoort bewerken</h1>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Naam lidsoort:</label><br>
    <input type="text" name="naam" value="<?= htmlspecialchars($soort['naam']) ?>" required><br><br>

    <button type="submit">Bijwerken</button>
</form>
?>

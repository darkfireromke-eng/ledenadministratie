<?php include_once "../includes/navigation.php"; ?>

<h1>Nieuwe lidsoort toevoegen</h1>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Naam lidsoort:</label><br>
    <input type="text" name="naam" required><br><br>

    <button type="submit">Opslaan</button>
</form>


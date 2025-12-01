<?php
require_once __DIR__ . "/../includes/database.php";
require_once __DIR__ . "/../familie/familie_logic.php";
require_once __DIR__ . "/../soort_lid/soort_lid_logic.php";

// Variabelen voor formulier
$naam = $geboortedatum = $familie_id = $soort_lid_id = "";
$errors = [];

// Form-verwerking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = trim($_POST['naam']);
    $geboortedatum = trim($_POST['geboortedatum']);
    $familie_id = trim($_POST['familie_id']);
    $soort_lid_id = trim($_POST['soort_lid_id']);

    if (empty($naam)) $errors[] = "Naam is verplicht.";
    if (empty($geboortedatum)) $errors[] = "Geboortedatum is verplicht.";
    if (empty($familie_id)) $errors[] = "Familie is verplicht.";
    if (empty($soort_lid_id)) $errors[] = "Soort lid is verplicht.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO familieleden (naam, geboortedatum, familie_id, soort_lid_id)
                VALUES (:naam, :geboortedatum, :familie_id, :soort_lid_id)
            ");
            $stmt->execute([
                ':naam' => $naam,
                ':geboortedatum' => $geboortedatum,
                ':familie_id' => $familie_id,
                ':soort_lid_id' => $soort_lid_id
            ]);

            header("Location: index.php");
            exit;

        } catch (PDOException $e) {
            $errors[] = "Fout bij opslaan: " . $e->getMessage();
        }
    }
}

// Ophalen dropdown-data
$families = getAllFamilies();
$soorten = getAllSoortLid();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Familie Lid</title>
</head>
<body>

<h1>Nieuw Familie Lid</h1>

<?php if (!empty($errors)): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST">
    <label>Naam: <input type="text" name="naam" value="<?= htmlspecialchars($naam) ?>"></label><br><br>

    <label>Geboortedatum: <input type="date" name="geboortedatum" value="<?= htmlspecialchars($geboortedatum) ?>"></label><br><br>

    <label>Familie:
        <select name="familie_id">
            <option value="">-- Kies familie --</option>
            <?php foreach ($families as $family): ?>
                <option value="<?= $family['id'] ?>" <?= $family['id']==$familie_id?'selected':'' ?>>
                    <?= htmlspecialchars($family['naam']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <label>Soort lid:
        <select name="soort_lid_id">
            <option value="">-- Kies soort lid --</option>
            <?php foreach ($soorten as $soort): ?>
                <option value="<?= $soort['id'] ?>" <?= $soort['id']==$soort_lid_id?'selected':'' ?>>
                    <?= htmlspecialchars($soort['lidsoort']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="submit">Opslaan</button>
</form>

</body>
</html>

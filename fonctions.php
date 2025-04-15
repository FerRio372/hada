<?php
function estPremier($nombre) {
    if ($nombre <= 1) {
        return false;
    }
    if ($nombre == 2) {
        return true;
    }
    if ($nombre % 2 == 0) {
        return false;
    }
    for ($i = 3; $i <= sqrt($nombre); $i += 2) {
        if ($nombre % $i == 0) {
            return false;
        }
    }
    return true;
}

$resultat = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = intval($_POST["nombre"]);
    if ($nombre >= 0 && $nombre <= 10000) {
        if ($nombre == 0) {
            $resultat = "0 n'est pas un nombre premier (cas particulier).";
        } else {
            $estPremier = estPremier($nombre);
            $resultat = "$nombre " . ($estPremier ? "est" : "n'est pas") . " un nombre premier.";
        }
    } else {
        $resultat = "Veuillez entrer un nombre entre 0 et 10000.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nombres premiers</title>
</head>
<body>
    <h1> nombres premiers</h1>
    <form method="post">
        <label for="nombre">Entrez un nombre:</label>
        <input type="number" id="nombre" name="nombre" required>
        <input type="submit" value="Vérifier">
    </form>
    <?php if (!empty($resultat)): ?>
        <p><?php echo htmlspecialchars($resultat); ?></p>
    <?php endif; ?>
</body>
</html>
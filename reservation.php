<?php
require_once 'config/database.php';
$stmt = $pdo->query('SELECT id_vehicule, modele, prix_jour FROM vehicule');
$vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);

$preselectId = intval($_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom         = trim($_POST['nom']);
    $prenom      = trim($_POST['prenom']);
    $email       = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $id_vehicule = intval($_POST['id_vehicule']);
    $date_debut  = $_POST['date_debut'];
    $date_fin    = $_POST['date_fin'];

    if ($nom && $prenom && $email && $id_vehicule && $date_debut && $date_fin) {

        $sql = 'INSERT INTO reservation
                (nom, prenom, email, id_vehicule, date_debut, date_fin)
                VALUES (?, ?, ?, ?, ?, ?)';

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $email, $id_vehicule, $date_debut, $date_fin]);

        header('Location: confirmation.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriveEasy</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
  <h1>DriveEasy</h1>
  <p>La liberté de rouler</p>
</header>

<nav>
  <a href="index.php">Accueil</a>
  <a href="vehicules.php">Nos véhicules</a>
  <a href="reservation.php">Réserver</a>
</nav>

<h1>Réserver un véhicule</h1>

<form method="POST" action="reservation.php">

  <input type="text" name="nom" placeholder="Nom" required>

  <input type="text" name="prenom" placeholder="Prénom" required>

  <input type="email" name="email" placeholder="Email" required>

<select name="id_vehicule" required>
  <option value="">-- Choisir un véhicule --</option>

  <?php foreach ($vehicules as $v) : ?>
    <option value="<?= $v['id_vehicule'] ?>"
      <?= $v['id_vehicule'] == $preselectId ? 'selected' : '' ?>>
      
      <?= htmlspecialchars($v['modele']) ?>
      — <?= $v['prix_jour'] ?> €/jour
    </option>
  <?php endforeach; ?>

</select>
<input type="date" name="date_debut" required>

<input type="date" name="date_fin" required>

<button type="submit">Réserver</button>

</form>


<footer>
  <p>DriveEasy - Location de véhicules</p>
  <p>Paris - 01 23 45 67 89</p>
  <p>&copy; 2026 DriveEasy</p>
</footer>

</body>
</html>
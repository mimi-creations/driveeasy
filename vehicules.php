<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM vehicule ORDER BY prix_jour ASC");
$vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

<h2>Nos véhicules</h2>

<div class="cards">

<?php foreach ($vehicules as $v): ?>

  <div class="card-vehicule">

    <img src="images/<?= htmlspecialchars($v['image']) ?>">

    <h3><?= htmlspecialchars($v['modele']) ?></h3>

    <p><?= $v['type'] ?> - <?= $v['nb_places'] ?> places</p>

    <p><?= number_format($v['prix_jour'], 2) ?> € / jour</p>

    <a href="vehicule.php?id=<?= $v['id_vehicule'] ?>">
      Voir le véhicule
    </a>

  </div>

<?php endforeach; ?>

</div>

<footer>
  <p>DriveEasy - Location de véhicules</p>
  <p>Paris - 01 23 45 67 89</p>
  <p>&copy; 2026 DriveEasy</p>
</footer>

</body>
</html>
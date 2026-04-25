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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
  <title>Nos véhicules — DriveEasy</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="topbar">
  <a href="index.php" class="topbar-logo">DriveEasy</a>
  <div class="topbar-links">
    <a href="index.php">Accueil</a>
    <a href="vehicules.php" class="active">Nos véhicules</a>
    <a href="reservation.php">Réserver</a>
  </div>
</nav>

<div class="vehicules-header">
  <h1 class="vehicules-title">Nos <span>véhicules</span></h1>
  <p class="vehicules-sub"><?= count($vehicules) ?> véhicules disponibles — du citadin au SUV</p>
</div>

<div class="cards">
  <?php foreach ($vehicules as $v): ?>
  <div class="card-vehicule">
    <img src="images/<?= htmlspecialchars($v['image']) ?>"
         alt="<?= htmlspecialchars($v['modele']) ?>">
    <div class="card-body">
      <span class="card-badge"><?= htmlspecialchars($v['type']) ?></span>
      <h3><?= htmlspecialchars($v['modele']) ?></h3>
      <p><?= $v['nb_places'] ?> places</p>
      <div class="card-footer">
        <span class="price"><?= number_format($v['prix_jour'], 2) ?> €<small>/jour</small></span>
        <a href="vehicule.php?id=<?= $v['id_vehicule'] ?>" class="btn-card">Voir →</a>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<footer>
  <p>DriveEasy - Location de véhicules</p>
  <p>Paris — 01 23 45 67 89</p>
  <p>&copy; 2026 DriveEasy</p>
</footer>

</body>
</html>
<?php
require_once 'config/database.php';

$id = intval($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM vehicule WHERE id_vehicule = ?");
$stmt->execute([$id]);
$v = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$v) {
    header("Location: vehicules.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
  <title><?= htmlspecialchars($v['modele']) ?> — DriveEasy</title>
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

<div class="detail-wrap">

  <div class="detail-img-wrap">
      <img src="<?= strpos($v['image'], 'http') === 0 ? htmlspecialchars($v['image']) : 'images/' . htmlspecialchars($v['image']) ?>"
        alt="<?= htmlspecialchars($v['modele']) ?>"
        class="detail-img">
  </div>

  <div class="detail-info">
    <span class="detail-badge"><?= htmlspecialchars($v['type']) ?></span>
    <h1 class="detail-title"><?= htmlspecialchars($v['modele']) ?></h1>
    <p class="detail-desc"><?= htmlspecialchars($v['description']) ?></p>

    <div class="detail-specs">
      <div class="spec-item">
        <span class="spec-label">Places</span>
        <span class="spec-val"><?= $v['nb_places'] ?></span>
      </div>
      <div class="spec-item">
        <span class="spec-label">Type</span>
        <span class="spec-val"><?= htmlspecialchars($v['type']) ?></span>
      </div>
      <div class="spec-item">
        <span class="spec-label">Prix</span>
        <span class="spec-val"><?= number_format($v['prix_jour'], 2) ?> €/jour</span>
      </div>
    </div>

    <div class="detail-prix">
      <?= number_format($v['prix_jour'], 2) ?> € <span>/ jour</span>
    </div>

    <a href="reservation.php?id=<?= $v['id_vehicule'] ?>" class="btn-resa">
      Réserver ce véhicule →
    </a>

    <a href="vehicules.php" class="detail-retour">← Retour aux véhicules</a>
  </div>

</div>

<footer>
  <p>DriveEasy - Location de véhicules</p>
  <p>Paris — 01 23 45 67 89</p>
  <p>&copy; 2026 DriveEasy</p>
</footer>

</body>
</html>
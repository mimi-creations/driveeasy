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
        $sql = 'INSERT INTO reservation (nom, prenom, email, id_vehicule, date_debut, date_fin)
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
  <title>Réserver — DriveEasy</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="topbar">
  <a href="index.php" class="topbar-logo">DriveEasy</a>
  <div class="topbar-links">
    <a href="index.php">Accueil</a>
    <a href="vehicules.php">Nos véhicules</a>
    <a href="reservation.php" class="active">Réserver</a>
  </div>
</nav>

<div class="resa-wrap">
  <h1 class="resa-title">Réserver un <span>véhicule</span></h1>
  <p class="resa-sub">Remplissez le formulaire ci-dessous — réservation confirmée en quelques secondes.</p>

  <form method="POST" action="reservation.php" class="form-card">

    <p class="form-section-title">Vos informations</p>
    <div class="form-row">
      <div class="form-field">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" placeholder="Dupont" required>
      </div>
      <div class="form-field">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" placeholder="Marie" required>
      </div>
    </div>
    <div class="form-row single">
      <div class="form-field">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="marie.dupont@email.com" required>
      </div>
    </div>

    <div class="form-divider"></div>
    <p class="form-section-title">Votre véhicule</p>
    <div class="form-row single">
      <div class="form-field">
        <label for="id_vehicule">Modèle</label>
        <select name="id_vehicule" id="id_vehicule" required>
          <option value="">-- Choisir un véhicule --</option>
          <?php foreach ($vehicules as $v) : ?>
            <option value="<?= $v['id_vehicule'] ?>"
              <?= $v['id_vehicule'] == $preselectId ? 'selected' : '' ?>>
              <?= htmlspecialchars($v['modele']) ?> — <?= $v['prix_jour'] ?> €/jour
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-divider"></div>
    <p class="form-section-title">Dates de location</p>
    <div class="form-row">
      <div class="form-field">
        <label for="date_debut">Date de départ</label>
        <input type="date" name="date_debut" id="date_debut" r
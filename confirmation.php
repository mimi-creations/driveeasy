<?php
$vehicule = htmlspecialchars($_GET['vehicule'] ?? 'Non précisé');
$depart   = htmlspecialchars($_GET['depart'] ?? '—');
$retour   = htmlspecialchars($_GET['retour'] ?? '—');
?> //Ce bloc PHP sert à récupérer et sécuriser les informations passées dans l'URL après une réservation.

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
  <title>Confirmation — DriveEasy</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="topbar">
  <a href="index.php" class="topbar-logo">DriveEasy</a>
  <div class="topbar-links">
    <a href="index.php">Accueil</a>
    <a href="vehicules.php">Nos véhicules</a>
    <a href="reservation.php">Réserver</a>
  </div>
</nav>

<section class="confirm-wrap">
  <div class="check-circle">
    <svg viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="2.5"
         stroke-linecap="round" stroke-linejoin="round" width="36" height="36">
      <polyline points="20 6 9 17 4 12"/>
    </svg>
  </div>

  <h2 class="confirm-title">Réservation <span>confirmée</span> !</h2>
  <p class="confirm-sub">Merci pour votre confiance. Votre demande a bien été enregistrée.<br>Vous recevrez un récapitulatif par e-mail.</p>

  <div class="confirm-card">
    <p class="confirm-card-title">Récapitulatif</p>

    <div class="confirm-row">
      <span class="confirm-row-label">Véhicule</span>
      <span class="confirm-row-val"><?= $vehicule ?></span>
    </div>
    <div class="confirm-row">
      <span class="confirm-row-label">Départ</span>
      <span class="confirm-row-val"><?= $depart ?></span>
    </div>
    <div class="confirm-row">
      <span class="confirm-row-label">Retour</span>
      <span class="confirm-row-val"><?= $retour ?></span>
    </div>
  </div><!-- fermeture confirm-card -->

  <a href="index.php" class="btn">Retour à l'accueil →</a>
</section>

<footer>
  <p>DriveEasy - Location de véhicules</p>
  <p>Paris — 01 23 45 67 89</p>
  <p>&copy; 2026 DriveEasy</p>
</footer>

</body>
</html>
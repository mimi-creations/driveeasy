<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
  <meta name="description" content="DriveEasy - Location de véhicules modernes à Paris au meilleur prix.">
  <title>DriveEasy — Location de véhicules à Paris</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>  //  charset UTF-8 : gère les caractères spéciaux (é, à, ç…).
        // viewport : rend le site responsive (adapté mobile/tablette).
        // Google Fonts : charge la police Josefin Sans.
        // style.css : notre feuille de style personnalisée.

<nav class="topbar">
  <a href="index.php" class="topbar-logo">DriveEasy</a>
  <div class="topbar-links">
    <a href="index.php" class="active">Accueil</a>
    <a href="vehicules.php">Nos véhicules</a>
    <a href="reservation.php">Réserver</a>
  </div>
</nav>

<section class="hero">
  <div class="hero-inner">
    <div>
      <span class="hero-badge">Location de véhicules — Paris</span>
      <h2>Roulez libre,<br>payez <span>moins</span></h2>
      <p>Des centaines de véhicules disponibles.<br>Réservation en 2 minutes, sans frais cachés.</p>
    </div>

    <div class="booking-card">
      <p>Réservez votre véhicule</p>
      <div class="booking-fields">
        <div class="booking-field">
          <label for="lieu-depart">Lieu de prise en charge</label>
          <input type="text" id="lieu-depart" value="Paris Centre">
        </div>
        <div class="booking-field">
          <label for="lieu-retour">Lieu de restitution</label>
          <input type="text" id="lieu-retour" value="Même agence">
        </div>
        <div class="booking-field">
          <label for="date-depart">Date de départ</label>
          <input type="date" id="date-depart">
        </div>
        <div class="booking-field">
          <label for="date-retour">Date de retour</label>
          <input type="date" id="date-retour">
        </div>
      </div>
      <a href="vehicules.php" class="btn-resa">Rechercher un véhicule →</a>
    </div>
  </div>
</section>

<div class="reassurance">
  <div class="rea-item">
    <div class="rea-num">+500</div>
    <div class="rea-label">Véhicules disponibles</div>
  </div>
  <div class="rea-item">
    <div class="rea-num">4.8/5</div>
    <div class="rea-label">Avis clients</div>
  </div>
  <div class="rea-item">
    <div class="rea-num">0€</div>
    <div class="rea-label">Frais de réservation</div>
  </div>
  <div class="rea-item">
    <div class="rea-num">24/7</div>
    <div class="rea-label">Assistance incluse</div>
  </div>
</div>

<footer>
  <p>DriveEasy - Location de véhicules</p>
  <p>Paris — 01 23 45 67 89</p>
  <p>&copy; 2026 DriveEasy</p>
</footer>

</body>
</html>
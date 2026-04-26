# DriveEasy — Location de véhicules

DriveEasy est un site web de location de véhicules développé dans le cadre d'un projet scolaire.
Il permet aux utilisateurs de consulter un catalogue de voitures, de voir la fiche détaillée de chaque véhicule et de soumettre une réservation en ligne. Les données sont stockées en base de données MySQL et le site est développé en PHP natif.

---

## Fonctionnalités

- Affichage du catalogue de véhicules depuis la base de données
- Fiche détaillée par véhicule
- Formulaire de réservation avec validation
- Page de confirmation après réservation
- Design responsive (mobile, tablette, desktop)

---

## Prérequis

- [XAMPP](https://www.apachefriends.org/fr/index.html) (Apache + MySQL + PHP)
- Un navigateur web (Chrome, Firefox, Edge…)

---

## Installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/votre-lien/driveeasy.git
   ```

2. **Copier le projet dans XAMPP**
   Placez le dossier `driveeasy` dans `C:/xampp/htdocs/`

3. **Créer la base de données**
   - Ouvrez phpMyAdmin : [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Créez une base de données nommée `driveeasy`
   - Importez le fichier SQL fourni dans le dépôt

4. **Configurer la connexion**
   Vérifiez les paramètres dans `config/database.php` :
   ```php
   $host = 'localhost';
   $dbname = 'driveeasy';
   $user = 'root';
   $password = '';
   ```

5. **Lancer le projet**
   - Démarrez Apache et MySQL dans XAMPP
   - Ouvrez [http://localhost/driveeasy](http://localhost/driveeasy)

---

## Équipe

| Membre | Rôle |
|--------|------|
| Iman | CSS — Design et intégration visuelle |
| Nesrine | PHP — Développement back-end et base de données |

---

## Structure du projet

```
driveeasy/
├── config/
│   └── database.php
├── css/
│   └── style.css
├── images/
├── index.php
├── vehicules.php
├── vehicule.php
├── reservation.php
└── confirmation.php
```

# Portfolio PHP

Ce projet est un portfolio web développé en PHP, utilisant Bootstrap, Font Awesome et Dompdf pour la génération de CV en PDF.

## Installation

1. **Cloner le dépôt ou copier les fichiers dans votre dossier WAMP/LAMP/XAMPP**  
   Placez le dossier `portfolio-php` dans le répertoire `www` (WAMP) ou `htdocs` (XAMPP).

2. **Créer la base de données**  
   Importez la requête SQL ci-dessous dans phpMyAdmin ou via la ligne de commande MySQL.

3. **Configurer la connexion à la base de données**  
   Modifiez le fichier `config/config.php` si besoin (nom de la base, utilisateur, mot de passe).

4. **Installer les dépendances Composer**  
   Depuis le dossier du projet, exécutez :
   ```bash
   composer install
   ```

5. **Accéder au site**  
   Rendez-vous sur [http://localhost/portfolio-php](http://localhost/portfolio-php) dans votre navigateur.

---

## Structure du projet

- `index.php` : page d'accueil du portfolio
- `pages/projet.php` : détail d'un projet
- `pages/cv.php` : génération du CV en PDF
- `template/Include/header.php` et `footer.php` : en-tête et pied de page
- `assets/css/style.css` : styles personnalisés
- `src/contact.php` : gestion du formulaire de contact

---

## Requête SQL pour créer la base de données

```sql
CREATE DATABASE IF NOT EXISTS portfolio_cv CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE portfolio_cv;

CREATE TABLE IF NOT EXISTS projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    info TEXT NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    lien VARCHAR(255) DEFAULT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Exemple d'insertion
INSERT INTO projets (titre, info, image, lien) VALUES
('Projet Exemple', 'Description de mon projet exemple.', 'assets/images/projet1.jpg', 'https://github.com/xdarkcaim');
```

---

## Auteur

Kévin  
[GitHub](https://github.com/xdarkcaim)



## README

### Description générale

L'application développée est une application web légère utilisant CodeIgniter 4, avec AdminLTE pour l'interface utilisateur et SQLite pour la gestion des données. Les fonctionnalités actuellement en place incluent :

1. **Écran de connexion :**
   - Les utilisateurs peuvent se connecter via un formulaire de connexion sécurisé.
   - L'authentification vérifie les informations d'identification contre la base de données SQLite.
   - Les sessions sont utilisées pour maintenir l'état de connexion de l'utilisateur.
   - Si un utilisateur est connecté, il est redirigé vers le dashboard en accédant à la racine du site.

2. **Page d'accueil (Dashboard) :**
   - Une fois authentifié, l'utilisateur est redirigé vers une page d'accueil (dashboard).
   - L'accès au dashboard est protégé, et les utilisateurs non connectés sont redirigés vers la page de login.

3. **Gestion de la base de données :**
   - Utilisation de SQLite comme base de données.
   - Les migrations sont utilisées pour créer les tables nécessaires, y compris l'insertion d'un utilisateur administrateur par défaut.

4. **Gestion des utilisateurs :**
   - Les administrateurs peuvent ajouter, modifier et supprimer des utilisateurs.
   - Les utilisateurs peuvent avoir un rôle d'administrateur ou d'utilisateur.
   - Les routes associées à la gestion des utilisateurs sont protégées et accessibles uniquement aux administrateurs.

5. **Structure de fichiers et configurations :**
   - Les fichiers CSS et JS d'AdminLTE sont intégrés et correctement référencés.
   - Le fichier `.gitignore` est configuré pour exclure `writable/database.sqlite` du suivi Git.
   - La barre latérale et la barre supérieure sont fixes, seules les sections de contenu changent lors de la navigation.

### Routes configurées

- `/` : Redirige vers la page de login si l'utilisateur n'est pas connecté, sinon vers le dashboard.
- `/login` : Affiche le formulaire de connexion.
- `/login/authenticate` : Traite les informations de connexion et authentifie l'utilisateur.
- `/logout` : Déconnecte l'utilisateur.
- `/dashboard` : Affiche la page d'accueil (dashboard) pour les utilisateurs authentifiés.
- `/users` : Affiche la liste des utilisateurs pour les administrateurs.
- `/users/create` : Affiche le formulaire pour ajouter un utilisateur.
- `/users/store` : Traite les informations pour ajouter un nouvel utilisateur.
- `/users/edit/(:segment)` : Affiche le formulaire pour modifier un utilisateur existant.
- `/users/update/(:segment)` : Traite les informations pour mettre à jour un utilisateur existant.
- `/users/delete/(:segment)` : Supprime un utilisateur existant.

### Configuration et inclusion des fichiers

- **Layout principal** : `app/Views/layout.php`
- **Barre latérale** : `app/Views/sidebar.php`
- **Vues utilisateur** : `app/Views/users/index.php`, `app/Views/users/create.php`, `app/Views/users/edit.php`

### Instructions pour démarrer l'application

1. **Cloner le dépôt :**
   ```bash
   git clone <url_du_dépôt>
   cd <nom_du_dépôt>
   ```

2. **Installer les dépendances :**
   ```bash
   composer install
   npm install
   ```

3. **Configurer l'environnement :**
   - Renommez le fichier `env` en `.env`.
   - Configurez le fichier `.env` pour activer le mode développement :
     ```ini
     CI_ENVIRONMENT = development
     ```

4. **Créer la base de données :**
   - Créez le fichier de base de données SQLite :
     ```bash
     touch writable/database.sqlite
     ```

5. **Exécuter les migrations :**
   ```bash
   php spark migrate
   ```

6. **Démarrer le serveur de développement :**
   ```bash
   php spark serve
   ```

7. **Accéder à l'application :**
   - Ouvrez votre navigateur et accédez à `http://localhost:8080`.

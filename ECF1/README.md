# Laravel Application

## 📌 Prérequis
- PHP >= 8.1
- Composer
- Node.js & npm
- SQLite

## 🚀 Installation

1. **Cloner le dépôt**
   ```sh
   git clone https://github.com/AxelDemeyere/FitLife.git
   cd votre-repo
   ```

2. **Installer les dépendances PHP**
   ```sh
   composer install
   ```

3. **Exécuter les migrations et les seeders (optionnel)**
   ```sh
   php artisan migrate --seed
   ```

4. **Installer les dépendances front-end** (si l'application utilise Vue.js, React ou Tailwind)
   ```sh
   npm install && npm run build
   ```

5. **Lancer le serveur local**
   ```sh
   composer run dev
   ```
   
L'application sera accessible sur `http://127.0.0.1:8000`

## 🔐 Gestion des utilisateurs
- Commande pour créer un administrateur :
  ```sh
  php artisan tinker
  ```
  ```php
  \App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password'), 'is_admin' => true]);
  ```

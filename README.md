# This is a single page responsive app built with Laravel 8.72, Vue.js 3.2, Inertia 0.10 and Bootstrap 4

## Installation Prerequisite
----------------------
- Make sure your machine has docker (you can try docker desktop https://www.docker.com/products/docker-desktop), git and composer installed.

## Installation Steps
----------------------
- Clone this repository: **git clone https://github.com/sarwarzahan/laravel-vue-inertia-responsive-app.git**
- Change directory: **cd laravel-vue-inertia-responsive-app**
- run: **composer install**
- Change the settings on **.env** file, if the file doesn't exist copy from **.env.example**
- Create docker containers to start the project run: **./vendor/bin/sail up -d**

## Create Tables, load DataFixures
-------------------------------------------------
- Create mysql tables run: **./vendor/bin/sail up -d **
- Load data fixures for all drop-values values like "Your Shop Category" run: **./vendor/bin/sail php artisan db:seed**

## Generate files for front end Vue, Bootstrap
- Run: **./vendor/bin/sail php artisan db:seed**

## Browse the application
----------------------------
- Now go to **http://localhost** in your browser.
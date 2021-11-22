# This is a single page responsive app built with Laravel 8.72, Vue.js 3.2, Inertia 0.10 and Bootstrap 4.
To describe the project approach Laravel is used to implement back-end business logic and interaction with the database. Inertia.js with Vue.js is used to build single page application. Here Inertia.js helps interacting with back-end routing and controllers. Bootstrap Sass helps with responsive layout and override default design.

## User stories:
- User can view the form appropriately on a variety of devices
- User can submit a portfolio successfully and see appropriate records saved to a database
- User cannot submit the same portfolio link twice, but instead am presented with an error message
- User cannot submit the form with incomplete data (i.e. only step one, but not step two data)
- User am directed to a confirmation screen only after the form has been successfully submitted

## Database Design
**shop_categories** table store categories for shop. **seller_applications** table store user application info. **shop_categories** has **one to many** relation with **seller_applications**. **application_answer_options** table stores different answer options for questions asked to the seller. **application_answers** table store seller's answers. This is a relational table which maintain **many to many** relation between **seller_applications** and **application_answer_options** tables.

## Installation Prerequisite
----------------------
- Make sure your machine has docker (you can try docker desktop https://www.docker.com/products/docker-desktop), git installed.

## Installation Steps
----------------------
- Clone this repository: **git clone https://github.com/sarwarzahan/laravel-vue-inertia-responsive-app.git**
- Change directory: **cd laravel-vue-inertia-responsive-app**
- run: **docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs**
- Change the settings on **.env** file, if the file doesn't exist copy from **.env.example**
- Create docker containers to start the project run: **./vendor/bin/sail up -d**

## Create Tables, load DataFixures
-------------------------------------------------
- Create mysql tables run: **./vendor/bin/sail php artisan migrate**
- Load data fixures for all drop-values values like "Your Shop Category" run: **./vendor/bin/sail php artisan db:seed**

## Generate files for front end Vue, Bootstrap
- Install front end packages run: **./vendor/bin/sail npm install**
- To serve front end run: **./vendor/bin/sail npm run dev**

## Browse the application
----------------------------
- Now go to **http://localhost** in your browser.

## Known Issues
----------------------------
- If you face following error **Sail is not running**, then run again **./vendor/bin/sail up -d** to build up the containers.

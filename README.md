

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

Clone the repository

    git clone https://github.com/younessbenssassi/Blog-Laravel-Inertia-vue.git

Install all the dependencies

    composer install

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate:fresh --seed

Start the local development server

    php artisan serve

    npm run dev

You can now access the server at http://127.0.0.1:8000 

Please don't forget to configure mailhog


## **Car Laravel simple CRUD project with Authentication**

### My Development Environment
    * PHP 7.4.1
    * WAMP SERVER
    * Windows 10 OS
    * MySQL DB
### Login Information
    * email: admin@admin.com
    * password: admin
### About Pie Chart
    * Value percentage has calculated as random for example. Sometimes it shows 100%.
### URL
    * URL: http://localhost/cars/public/
### CSV
    * car/public/uploads/ directory you can find my csv file
    * My csv has no header. It was generated from MySQL. Therefore my code does not remove csv header.
    * Header remove code is available in car\app\Http\Controllers CarController.php line number 189 to 193.
## Ho to set up in my local machine
    * clone the repository
    * cd into your project
    * Install Composer Dependencies - 
   ```
        composer install
   ```
    * Install NPM Dependencies - 
   ```
        npm install
   ```
    * Create a copy of your .env file - 
   ```
        cp .env.example .env
   ```
    * Generate an app encryption key - 
   ```
        php artisan key:generate
   ```
    * Create an empty database for our application.
    * In the .env file, add database information to allow Laravel to connect to the database
    * Migrate the database -
  ```
        php artisan migrate
  ```
    * Seed the database - 
  ```
        php artisan db:seed
  ```
    * Serving Laravel - 
  ```
        php artisan serve
  ```
### If further Problem
[Follow this link](https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/)
Or email me.
    
    
    

### Installation

### Clone the repository
git clone https://github.com/ShifatNaznin/laravel-multiple-user-with-multiple-guard.git

### Install all the dependencies using composer
composer install

### Copy the example env file and make the required configuration changes in the .env file
.env.example to .env

### Database configuration
DB_DATABASE=your_database_name <br>
DB_USERNAME=your_user_name <br>
DB_PASSWORD=your_password

### Generate a new application key & storage link create
php artisan key:generate <br>
php artisan storage:link

### For Database create
php artisan migrate

### Start the local development server
php artisan serve

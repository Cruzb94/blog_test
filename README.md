Ejecutar los siguientes comandos:

composer install

configurar archivo .env con credenciales de base de datos y ejecutar:

php artisan key:generate

php artisan migrate

php artisan db:seed --class=UsersTableSeeder

# Leave Demo Package

## This is demo package

#Installation
#comment all lines in routes/web.php file.
#run command
-`composer require crazyboy/leave`
-`php artisan vendor:publish --tag=leave`
-`composer dumpautoload`
-`php artisan migrate`
-`php artisan db:seed --class=UsersTableSeeder`
# add credetials in .env file like database and mail

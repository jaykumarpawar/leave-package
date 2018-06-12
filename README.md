# Leave Demo Package

## This is demo package

#Installation
#comment all lines in routes/web.php file.
#run command
`composer require crazyboy/leave`
`composer dump-autoload`
`php artisan vendor:publish --tag=leave`
`php artisan db:seed --class=UsersTableSeeder`
`php artisan db:seed --class="leave\Database\Seeds\UsersTableSeeder"`

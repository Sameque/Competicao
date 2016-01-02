@echo off
//composer install
php artisan migrate:install
php artisan migrate
pause
copy UTL\BladeCompiler.php vendor\laravel\framework\src\Illuminate\View\Compilers
echo "Instalacao concluida"
pause
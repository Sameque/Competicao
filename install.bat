@echo off
php artisan migrate:install
php artisan migrate
php artisan db:seed
copy UTL\BladeCompiler.php vendor\laravel\framework\src\Illuminate\View\Compilers
copy UTL\.htaccess ..\
echo Instalacao concluida
pause
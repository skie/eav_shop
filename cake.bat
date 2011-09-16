:: cake bake model User
:: cake bake controller Users scaffold
:: cake bake view Users index
:: cake bake view Users info index
:: @echo.
@echo off
@set path=%path%;C:\dev\_tools_\graphviz-2.16\bin\;C:\php\php5.2.1\
SET app=%0
SET app1=%CD%
cd ..\lib\Cake\Console
SET lib=%~dp0
:: echo "%lib%cake.php"
php -q "%CD%\cake.php" -working "%app1%"  %*
:: echo.
cd %app1%
@echo on

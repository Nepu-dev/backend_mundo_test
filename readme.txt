*Se adjunta base de datos exportada de mysql cualquier cosa, importar y migrar con php artisan migrate
(En caso de no poder importar Base de datos, como en mi caso usando phpmyadmin, cambiar la collation en el archivo .sql
 de "utf8mb4_0900_ai_ci" con "utf8mb4_general_ci".)
php artisan migrate (La base de datos ya tiene las tablas correspondientes asi que quizá no sea necesario, si falla, migrar)
cambiar archivo .env (en caso de no poseer, se adjuntará en el mismo repositorio, solo cambiar el nombre a .env)
usuario: root
contraseña: root
composer install
php artisan serve
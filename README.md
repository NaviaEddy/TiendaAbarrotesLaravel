
php artisan serve
Este comando levanta un servidor de desarrollo local en http://localhost:8000.
Crear un modelo con su migración, seeder, factory, controlador y recursos
En Laravel, los modelos deben empezar con mayúsculas y estar en singular. Este comando crea un modelo y, adicionalmente, una migración, un seeder, una factory y un controlador de recursos:

php artisan make:model Participante -msfcr
-m: Crea una migración para el modelo.
-s: Crea un seeder para el modelo.
-f: Crea una factory para el modelo.
-c: Crea un controlador para el modelo.
-r: Indica que el controlador debe ser un controlador de recursos (resource controller).

Correr las migraciones
Para ejecutar todas las migraciones pendientes y actualizar la base de datos:

php artisan migrate
Ejecuta todas las migraciones pendientes y actualiza la base de datos.
Correr las migraciones borrando todo
Para borrar todas las tablas y volver a ejecutar todas las migraciones desde cero:

php artisan migrate:fresh
Borra todas las tablas y vuelve a ejecutar todas las migraciones desde cero.
Correr los seeders
Todos los seeders
Para ejecutar todos los seeders definidos en el archivo DatabaseSeeder:

php artisan db:seed
Ejecuta todos los seeders definidos en el archivo DatabaseSeeder.
Un solo seeder
Para ejecutar un seeder específico:

php artisan db:seed --class=PersonaSeeder
Ejecuta un seeder específico (PersonaSeeder).
Correr las migraciones borrando todo y luego correr los seeders
Para borrar todas las tablas, ejecutar todas las migraciones y luego ejecutar los seeders:

php artisan migrate:fresh --seed
Borra todas las tablas, ejecuta todas las migraciones y luego ejecuta los seeders.
Mostrar todas las rutas disponibles
Para listar todas las rutas registradas en tu aplicación:

php artisan route:list
Lista todas las rutas registradas en tu aplicación.
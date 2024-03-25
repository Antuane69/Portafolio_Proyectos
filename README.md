# Little Tokyo

## Descargar el proyecto

1. Crear base de datos con nombre **rij** con esta codificacion  utf8_general_ci
2. **npm install && run dev**
3. Instalar composer, luego correr composer update y al final composer autoload
4. **php artisan storage:link**
5. **php artisan migrate:fresh --seed**

---
## Settear ambiente local
1. Ve al archivo config/app.php y asegurate que en la seccion Application URL este las linea que dicen localhost **Descomentadas** y las que tienen una direccion ip **Comentadas**
2. En la raiz del proyecto esta el archivo .env, configura los nombres de la base de datos, etc, conforme a tus necesidades.

---
## Correr el proyecto de manera local
php artisan serve

---

## Limpiar el cache del proyecto en caso de ser necesario
php artisan cache:clear

## Proyecto realizado por

- Antuane Alexander Nacif Gonzalez
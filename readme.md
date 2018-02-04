<p align="center">Post</p>

## Requerimientos

- composer -V 1.4.1
- PHP -v >=5.6.4 - 7.1.4



## Uso
1. **clone** : git clone https://github.com/cmcuriqueo/post.git
2. **php dependencias** : composer install
4. **.env** : archivo de entorno .env
    - `configuración de base de datos` :
        ```
        DB_CONNECTION=
        DB_HOST=
        DB_PORT=
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
        ```

    -  `key` : php artisan key:generate
5. **migraciones** : 
    - php artisan migrate
8. php artisan serve

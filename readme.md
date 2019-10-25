# barber_app
1. ``cp .env-example .env``
2. ``git submodule add https://github.com/Laradock/laradock.git laradock-barber_app``
3. ``cd laradock-barber_app && cp env-example .env && docker-compose up -d nginx mysql``
4. Wejść do kontenera (może być inna nazwa kontenera) 

* ``docker exec -it --user 1000 laradock_workspace_1 bash``
* ``composer install``
* ``stworzyć bazę danych na kontenerze mysql o nazwie default``
* ``php artisan migrate``
* ``php artisan key:generate``

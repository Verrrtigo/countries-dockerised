## Description
Built utilising https://github.com/ger86/symfony-docker to set up boilerplate for nginx, php and symfony

## Installation

1. Clone the repository. And open the repository folder in a terminal.

2. Open `./docker` directory in a terminal and run `docker compose up -d` to start containers.

3. Once the containers are started, the app should be accessible on `localhost:80`

6. Inside the `php` container, run `composer install` to install dependencies from `/var/www/symfony` folder.

## To use the app

The default/home route (`/`) will show a list of all countries. The table is sortable by clicking on the header to sort by, toggling between ascending and descending. There is also a possibility to search the table.

There are three links to get a differently filtered table
-list all countries
-list all countries with a population smaller than Lithuania
-list all countries that are in Europe
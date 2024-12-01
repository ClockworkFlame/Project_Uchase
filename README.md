Installation:
- DB cretentials are located at docker-compose.yaml and on line 30 of ".env". Update if need be.
- Run "docker-compose build" followed by "docker-compose up" to setup the images and containers.
- Doctrine handles DB creation and mapping, so we need to run these commands in order, inside the PHP docker container terminal
    - cd var/www/html
    - php bin/console make:migration
    - php bin/console doctrine:migrations:migrate
- Populate DB tables with example SQL below.
- Navigate to http://127.0.0.1:8080/

SQL:
- Inserts pet types (required) - INSERT INTO `tutorial`.`animal_type` (`name`, `created`, `modified`) VALUES ('cat', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()), ('dog', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()), ('bird', UNIX_TIMESTAMP(), UNIX_TIMESTAMP());

Packages used:
- Symfony
- Symfony Asset (For importing css/js files in the document)
- Symfony Var-dumper (Debugging)
- Symfony Form (Automating form generation)
- Symfony Validator (Form validation)
- Symfony http-foundation (Flash notifications)
- Doctrine
- Twig

Commands to remember:
- php bin/console make:migration
- php bin/console doctrine:migrations:migrate
- php bin/console doctrine:migrations:diff

ToDo:
- Find some sort of caching solution so pages to take a lifetime to load
- React

External help used:
- Creating the initial project skeleton, and dockerization https://aicha-fatrah.medium.com/dockerize-a-symfony-project-nginx-php-fpm-and-mariadb-f46fe9b190bb
- Offidical documentation pages for PHP 8-8.2, Symfony and Docker (Limited experience at time of writing, but ive got time so why not practice)
- Premade stylesheets from www.w3schools.com
- A lot of stackoverflow
- My cat
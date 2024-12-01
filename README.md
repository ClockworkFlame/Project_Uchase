Installation:
- DB cretentials are located at docker-compose.yaml and on line 30 of ".env". Update if need be.
- Run "docker-compose build" followed by "docker-compose up" to setup the images and containers.
- Doctrine handles DB creation and mapping, so we need to run these commands in order, inside the PHP docker container terminal
    - php bin/console doctrine:database:create tutorial
    - php bin/console make:migration
    - php bin/console doctrine:migrations:migrate
- Populate DB tables with example SQL below.
- Navigate to http://127.0.0.1:8080/

SQL:
- INSERT INTO `tutorial`.`animal_type` (`name`, `created`, `modified`) VALUES ('cat', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()), ('dog', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()), ('bird', UNIX_TIMESTAMP(), UNIX_TIMESTAMP());

Packages used:
- Symfony
- Symfony Asset
- Symfony Form
- Symfony http-foundation (for flash notification)
- Doctrine
- Twig

Commands to remember:
- php bin/console make:migration
- php bin/console doctrine:migrations:migrate
- php bin/console doctrine:migrations:diff

External help used:
- Creating the initial project skeleton, and dockerization https://aicha-fatrah.medium.com/dockerize-a-symfony-project-nginx-php-fpm-and-mariadb-f46fe9b190bb
- Offidical documentation pages for PHP 8-8.2, Symfony and Docker (Limited experience at time of writing, but ive got time so why not practice)
- Random stylesheet+html menu I found https://codepen.io/WhisnuYs/pen/XWdpdGP

1. Описание на задачата: създаване на шаблон за търсене, показване и добавяне на
домашни любимци. Заданието се състои от 3 части(секции):
· добавяне на нов запис за домашен любимец
· търсене по 2 критерия
· показване на резултатите, отговарящи на зададените критерии
4. Секции:
4.1. Добавяне
- шаблон за добавяне на нов домашен любимец
- всеки нов запис в базата данни трябва да включва данните от т.3.
4.2. Търсене
- текстово поле: търсене по име на домашния любимец. Полето не е задължително
за попълване.
- dropdown: избор на вид животно от съществуващите в базата данни. Полето не е
задължително за попълване.
4.3. Резултати:
- извеждане на списък с домашните любимци по зададените критерии в модула за търсене
- низходяща сортировка спрямо датата на въвеждане
- всеки един резултат да показва данните посочени в т.3.
- при търсене с въвеждане в полето за име на домашния любимец да се
маркира(highlight) търсения текст
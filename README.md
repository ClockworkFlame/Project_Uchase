Installation:
- DB cretentials are located at docker-compose.yaml and on line 30 of ".env". Update if need be.
- Run "docker-compose build" followed by "docker-compose up" to setup the images and containers.
- Doctrine handles DB creation and mapping, so we need to run these commands in order, inside the PHP docker container terminal (Idk if I should automate it in the PHP.Dockerfile or not)
    - php bin/console doctrine:database:create
    - php bin/console make:migration
    - php bin/console doctrine:migrations:migrate
- Navigate to http://127.0.0.1:8080/

Guides used:
- Creating the initial project skeleton, and dockerization https://aicha-fatrah.medium.com/dockerize-a-symfony-project-nginx-php-fpm-and-mariadb-f46fe9b190bb
- Offidical documentation pages for PHP 8-8.2, Symfony and Docker (Limited experience at time of writing, but ive got time so why not practice)

Packages used:
 - Symfony
 - Doctrine
 - Twig


1. Описание на задачата: създаване на шаблон за търсене, показване и добавяне на
домашни любимци. Заданието се състои от 3 части(секции):
· добавяне на нов запис за домашен любимец
· търсене по 2 критерия
· показване на резултатите, отговарящи на зададените критерии
2. Програмни средства:
· PHP >= 7.2
· MySQL > 5.0 или MariaDB >= 10.4
· HTML5
· CSS3
· JavaScript, jQuery
* няма ограничение за използването на външни библиотеки или frameworks
3. База данни: базата от данни трябва да съдържа следните данни за домашните любимци:
- име на домашния любимец . Например: Шаро, Лъки и т.н.
- информация за домашния любимец в свободен текст
- дата на добавяне в базата данни
- вид животно – куче, котка, папагал и т.н.
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
Към заданието е приложен незадължителен ориентировъчен шаблон за всяка една от
секциите, който може да преправите по Ваш избор.
Моля изпращайте готовото решение (source code + dump с базата данни) на имейла, от който
Ви изпращаме задачата.
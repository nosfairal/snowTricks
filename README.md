# Snowtricks
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/9942fd0861514ff3918a3d333f7a2f14)](https://www.codacy.com/gh/nosfairal/snowTricks/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=nosfairal/snowTricks&amp;utm_campaign=Badge_Grade)

Snowboard community site made with Symfony 5.

This is the sixth project of the formation Application Developer - PHP / Symfony on Openclassrooms.

## Table of contents
1.  Prerequisites and technologies
    -   Server
    -   Framework, languages and libraries

2.  Installation

## Prerequisites and technologies

**Server:**

You need a web server with PHP7 (>=7.2.5) and MySQL DBMS.

Versions used in this project:

    Apache 2.4.46
    PHP 7.4.14
    MariaDB 10.4.14

You also need an access to a SMTP server.

**Framework, languages and libraries:**

Framework: Symfony ^5.4.1

This project is coded in PHP7, HTML5, CSS3, Twig and JS.

Dependencies manager: Composer 2.2.3

Libraries included via Composer (used in fixtures):

    . doctrine/doctrine-fixtures-bundle: ^3.4,
    . cocur/slugify: ^4.1

Libraries included via Composer and Webpack Encore:

    . "@hotwired/stimulus": "^3.0.0",
    . "@popperjs/core": "^2.11.4",
    . "@symfony/stimulus-bridge": "^3.0.0",
    . "@symfony/webpack-encore": "^1.7.0",
    . "bootstrap": "^5.1.3",
    . "core-js": "^3.0.0",
    . "font-awesome": "^4.7.0",
    . "regenerator-runtime": "^0.13.2",
    . "sass": "^1.49.9",
    . "webpack-notifier": "^1.6.0"

## Installation

**Download or clone**

Download zip files or clone the project repository with github (see GitHub documentation).

**Configure environment variables**

You need to configure at least these lines in .env file with yours own datas:

``` ###> symfony/mailer ###
# MAILER_DSN=smtp://localhost
# MAILER_USER=smtp-user-email-address@domain.com
###< symfony/mailer ###
###< symfony/mailer ###
###> doctrine/doctrine-bundle ###
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
``` 

**Install the project**

1.   If needed, install Composer by [following the official instructions.](https://getcomposer.org/download/)

2.   In your cmd, go to the directory where you want to install the project and install dependencies with composer:
   
   ``$ cd some\directory ``
   
   ``$ composer install``

Dependencies should be installed in your project (check vendor directory).

**Create the database**

1.  If the database does not exist, create it with the following command in the project directory:

    ``$ php bin/console doctrine:database:create``

2.  Create database structure thanks to migrations:

    ``$ php bin/console doctrine:migrations:migrate``

3. Install fixtures to have first contents

    ``$ php bin/console doctrine:fixtures:load``

Your database should be updated with contents.

**Registration and become administrator**

1.  Complete the register form and confirm your inscription by clicking on the link you get by email.

2.  Go to your database, table user, and at your line change the "roles" field from [] to ["ROLE_ADMIN"].

You are now administrator of your website and can manage it. 


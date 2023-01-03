# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist "cakephp/app:^3.8"
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist "cakephp/app:^3.8" myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) (v5) CSS
framework by default. You can, however, replace it with any other library or
custom styles.

## Tutorial
guide here [docs/getting_started.md](https://github.com/nuzulfikrie/cakephp3-tutorial/blob/main/docs/getting_started.MD).

SQL here [docs/database_sql.md](https://github.com/nuzulfikrie/cakephp3-tutorial/blob/main/docs/database_sql.md)


## Run SQL in your desired MYSQL database
USE SQL  [docs/database_sql.md](https://github.com/nuzulfikrie/cakephp3-tutorial/blob/main/docs/database_sql.md)

## Start cakephp 3 local server
```
bin/cake server -p 8765
```

- Note that, cakephp 3 will run on port 8765. The displayed page is the default page of cakephp 3. Template located at `src/Template/Pages/home.ctp`
- If you edit the page at `src/Template/Pages/home.ctp`, the page will be updated automatically. No need to restart the server.
- The page, will highlight that database connection is not configured. This is because, we have not configured the database connection yet. We will do it later.

## Configuring Database Connection

- for general configuration, edit `config/app.php`.This file is not tracked by git. So, you can put your local configuration here.
- for local configuration, edit `config/app_local.php` , this will be used in running the application locally.Please note that, do not commit this file to git. To avoid this, add this file to `.gitignore` file. So that we don't accidentally commit file containing sensitive information.

 - Database configuration set for `default` database connection

````
//config/app_local.php

   'Datasources' => [
        'default' => [
            'host' => 'localhost',
            /*
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',
            'username' => 'YOUR USERNAME FOR MYSQL',
            'password' => 'YOUR PASSWORD FOR MYSQL',
            'database' => 'cms', // for this exercise, we will use database name cms
            'log' => true,
            'url' => env('DATABASE_URL', null),
        ],
    ],

````











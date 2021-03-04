![image](https://travis-ci.org/ilabafrica/iBLIS.svg?branch=master)

BLIS
=====

BLIS is a port of the Basic Laboratory Information System (<a href="https://github.com/C4G/BLIS">BLIS</a>) to the `Laravel 6.0` PHP Framework by iLabAfrica.
BLIS was originally developed by C4G. 

You can test and view the application [here](http://216.104.205.213).

Requirements
------------
1. Supported database. Currently only <a href='http://dev.mysql.com/downloads/mysql/'>MySQL</a> has been tested. Laravel also supports PostgreSQL, SQLite and SQL Server.
2. <a href='http://php.net/'>PHP</a> (>= 7.2).
3. <a href='https://getcomposer.org/'>Composer</a> - Dependency manager for PHP.

Installation
-----------
##### DOCKER
The easiest way to install is using docker, follow instruction [here](https://github.com/ilabafrica/iblis-contrib-docker) to install via docker. 

##### FROM SOURCE

1. Install the above mentioned requirements.
2. Extract this git repository to a local folder
    <blockquote>git clone git@github.com:ilabafrica/iBLIS.git </blockquote>
3. Change directory to the root folder of the application. Update **composer** then run it in order to install the application dependencies. You may need root permissions to update composer.
    <blockquote>
      composer self-update<br />
      composer install
    </blockquote>
4. Create a new file named `.env`

5. Copy `.env.example` file content into the `.env` file

6. Run `php artisan key:generate` in your terminal to create the application key and add it to the `APP_KEY` variable in the `.env` file
4. Update the application configuration files to suit your local settings:
  - Set the "Application URL" in `/config/app.php`
  - Create a database and set the database connection details in `/.env`
  - The organization name in `/config/kblis.php`

5. Run the migrations to create the required database tables.
    <blockquote>php artisan migrate</blockquote>
6. Load the basic seed data
    <blockquote> php artisan migrate --seed </blockquote>
   If #5 or #6 above fails, you may need to run the following command then repeat the two commands again.
    <blockquote> composer dumpautoload </blockquote>
7. If you are running the application on a webserver eg. apache, ensure that the webserver has write permissions to the /app/storage folder.
   Ideally the web-root should be the /public folder.
   The default login credentials are '*administrator*' '*password*'.

Troubleshooting
----------------
Ensure that you enable mod_rewrite, `sudo a2enmod rewrite` if you are using apache. This should solve the problem of routing failures.

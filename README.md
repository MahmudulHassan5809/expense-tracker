### A PHP application for tracking expenses using Custom PHP web framework(MVC)

    Framework feature: 
        1. Routeing Handle 
        2. Middleware handle
        2. Template Engine 
        3. Dependency Injection Using Container
        4. Form Validation
        5. Database Connection Using PDO
        6. Error Handle 

    Application Feature:
        1. Authentication.
        2. Transaction CRUD.
        3. Receipt CRUD.
        4. File handling.

## How to run

### Setup Database (Postgres)

    1. `sudo nano /etc/php/8.1/apache2/php.ini`. Replace your php version.
    2. And uncomment extension=pdo_pgsql, extension=pgsql.
    3. Now install required driver in ubuntu for `sudo apt install php8.1-pgsql`.
    4. Now you should connect postgres using PDO.
    5. NB: PostgreSql should install in you machine. Also if you want 
        you can use Mysql.

### Env variable setup

    . Create .env file in project root directory.
        ```
        APP_ENV=development
        DB_DRIVER=pgsql
        DB_HOST=localhost
        DB_PORT=3306
        DB_NAME=******
        DB_USER=******
        DB_PASS=******
        ```

### Install dependencies

    1. ```composer install```

### Run db script to generate table

    1. ```composer run-script db```

### Setup Apache Server In Ubuntu

    1. Run `cd /etc/apache2/sites-available`
    2. Create new file named expense_tracker.conf `sudo nano expense_tracker.conf`
    3. Put below content in this expense_tracker.conf file 
    ```
    <VirtualHost *:80>
        ServerName expense-tracker.local
        DocumentRoot /path_to_public_directory_of_project/public
       <Directory /path_to_public_directory_of_project/public>
     Require all granted
     AllowOverride None
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^  /index.php [L]
        </Directory>
    </VirtualHost>
    ```
    4. Now edit this file `sudo nano /etc/apache2/apache2.conf`.
    5. Put this line bottom of the file `ServerName expense-tracker.local`.
    6. Now disable default page for apache. So that we can use 80 port. `sudo a2dissite 000-default.conf`.
    7. Now run below commands to restart & enable our our created conf file.
        ```
        sudo a2ensite expense_tracker.conf
        sudo apachectl configtest
        sudo service apache2 restart
        ```
    8. Now you should access site in your local machine using <b>expense-tracker.local</b>

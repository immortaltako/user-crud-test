<p align="center"><a href="https://spadeinfotech.net/" target="_blank"><img src="https://spadeinfotech.net/wp-content/uploads/2020/07/SI6.png" width="649" height="165" alt="Spade Logo"></a></p>

## Resources used

- Laravel version 9.40.1
- PHP version 8.1.6
- Apache/2.4.53 (Win64) OpenSSL/1.1.1n
- Database client version: libmysql - mysqlnd 8.1.6
- Server version: 10.4.24-MariaDB [MySQL 8] - <a href="https://mariadb.com/kb/en/mariadb-vs-mysql-compatibility/" target="_blank">mariadb.org binary distribution</a>

## Apache setup
```
<VirtualHost *:80>
    ServerName spade.zz
    DocumentRoot "F:/user-crud-test/public"
    SetEnv APPLICATION_ENV "development"
    <Directory "F:/user-crud-test/public">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
        Order Deny,Allow
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>
```
## Installation instructions

- Laravel v9.40.1 (used PHP 8.1.6 on Apache, minimum requirement PHP 8). Installed by portable Composer.
- Please create your own .env file or inform me if needed, skipped by .gitignore
- Vendor folder is not included in the base repo, it needs to be added to run the project with dependencies.
- File compression, caching and .htaccess optimization not needed at this point.
- Adding a sample SQL database dump (spade_test.sql) which can be easily imported to any MySQL installation.
- If the added SQL file is used then migrate command won't be necessary to setup DB.
- The database dump is solely for testing the code without any need for initial db entries.
- The database name that is used in the dump data is 'Spade_test' so it is recommended to use in a db that does not already have a db with the same name.
- Laravel is platform independent so the code is expected to work on any platform that's running PHP
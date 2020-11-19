# IOU Newsletter 

## Setup and Installation

1. Copy/rename `env` to `.env` and tailor for your env configs, specifically the baseURL (line 25)
and any database settings (lines 59-61).

2. `composer install` to install the CodeIgniter dependencies.

3. `php spark migrate` to migrate in the table/database schema.

4. `php spark serve` if using the CI's built-in PHP server, or point your browser to `http://localhost/<project-dir>/public` if using Apache.


## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php) (disabled by default in XAMPP)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

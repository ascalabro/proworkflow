# Proworkflow API
PHP wrapper for Proworkflow API. 


Currently, it provides a 'read-only' access layer to the API... The ability to add, update resources on your Proworkflow instance, has not been implemented yet.

More info on the API: https://api.proworkflow.net/?calls#!


## Installing Proworkflow API

The recommended way to install Proworkflow API is through Composer.

### Install Composer

`curl -sS https://getcomposer.org/installer | php`

Next, run the Composer command to install the latest stable version of Guzzle:

`php composer.phar require ascalabro/proworkflow`

After installing, you need to require Composer's autoloader:

`require 'vendor/autoload.php';`

You can then later update Proworkflow API using composer:

`php composer.phar update`


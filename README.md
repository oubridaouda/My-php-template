# My-php-template
A personal cms with an integrated routing system to quickly initialize a php project.

# Installation
````
git clone git@github.com:oubridaouda/My-php-template.git
cd My-php-template
composer dump-autoload
````
# Router
````
If the routing does not work, create a VirtualHost and configure it.

Example:

<VirtualHost *:80> 
    DocumentRoot "C:/laragon/www/My-php-template/"
    ServerName My-php-template.test
    ServerAlias *.My-php-template.test
    <Directory "C:/laragon/www/My-php-template/">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
````


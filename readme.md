
##  Server Requirements

The Laravel framework 6.x has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.

However, if you are not using Homestead, you will need to make sure your server meets the following requirements:

    PHP >= 7.2.0
    BCMath PHP Extension
    Ctype PHP Extension
    JSON PHP Extension
    Mbstring PHP Extension
    OpenSSL PHP Extension
    PDO PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension



## Install

1) Run in your terminal:

``` bash
git clone https://github.com/pathirana/tempworks.git tempworks
```


2) Run in your tempworks folder:
``` bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

## Usage 

1. Your site is available at  http://127.0.0.1:8000



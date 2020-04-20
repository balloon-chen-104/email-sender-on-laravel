# Email Sender

## Implement sending email by laravel

This project is an example about sending email by laravel.

## Getting Started

### Prerequisites

This project is build in PHP with laravel framework. To install the project, you need to install PHP and [composer](https://getcomposer.org) first.

### Installing

After you clone the project, you need to enter the root folder and install all packages by composer.

```
email-sender-on-laravel$ composer install
```

Next, copy the .env.example in laravel. Then, generate a key for laravel. By default, we put .env file into .gitignore, so you can put your own environment settings here without leaking your private settings.

```
email-sender-on-laravel$ cp .env.example .env
email-sender-on-laravel$ php artisan key:generate
```

### environment

In order to set email host, you should adjust the environment settings of MAIL in .env file in the root folder. There is a example below.

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=YOUR_USERNAME@gmail.com
MAIL_PASSWORD=YOUR_PASSWORD_KEY
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=YOUR_USERNAME@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

> I use ssl for higher security. So the MAIL_PASSWORD is NOT your password of email. You need to generate a key on Gmail or whatever email host you use.

### run server

To run server, you should run the following command.

```
email-sender-on-laravel$ php artisan serve
```

## Usage

#### Here is our [home page](http://127.0.0.1:8000/email).

> I use port 8000 by default. If you don't, change the port by yourself.

You can now try to send emails.

## Author

* Balloon Chen

# Reiss Edwards E-commerce App

## Description

This project is an ecommerce application that enable users to purchase goods, make payment and track their goods. Vendors can also sign up, upload vendor document and start trading. This is a an application that enables many vendors to sell at any time.


## Prerequiste

<ul>
    <li>PHP 7</li>
    <li>Composer</li>
    <li>MySQL</li>
</ul>

## Technologies used

Modern PHP technologies were adopted for this project

Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony. Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
Visit [here](https://laravel.com/) for more information.


Mysql - Relational Database System used in project.

Gmail - Email SMTP client that enable you to send emails.

## Installation

### Step 1.
- Begin by cloning this repository to your machine/system 
```
git clone https://github.com/Damoscky/ecommerce-app.git
```

- Install dependencies
```
cd name && composer install
```

- Create enviromental file and variables
```
cp .env.example .env
```

- Generate app key
```
php artisan key:generate
php artisan jwt:secret
```

### Step 2
- Next, create a new database and reference its name and username/password in the projects .env file. Below the database name is "ecommerce-app"
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce-app
DB_USERNAME=root
DB_PASSWORD=
```

- Go to your gmail account and get your gmail domain and secret key. choose an email and senders name. If your gmail is not activated for third party use, kindly activate.
```
MAILGUN_DOMAIN=****
MAILGUN_SECRET=****
MAIL_FROM_ADDRESS=***@***.com
MAIL_FROM_NAME=*****
```

### Step 3
- Run migration to create all tables to the database.
```
php artisan migrate
```

- Run seeder to create the default roles and users
```
php artisan db:seed
```

### Step 4
- To start the server, run the command below
```shell
$ php artisan serve
```


### Default Users
- User Login
```
Email: dammy@user.com
Password: password
```

- Vendor/Merchant Login
```
Email: dammy@vendor.com
Password: password
```

- Admin Login
```
Email: admin@admin.com
Password: password
```

Thank you!

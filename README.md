# Auth App Example

## Prerequisites

```
php: "^7.3|^8.0",
nodejs: v14.17.4
```

## Installation

Clone the repository:
```
git clone git@github.com:sylviusroeles/simple-auth.git
cd simple-auth
```

Installing assets:
```
composer install
npm install && npm run dev
```

Configuring the env file
```
cp .env.example .env
php artisan key:generate
```

Change the following env variables
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE= {YOUR DB NAME}
DB_USERNAME= {YOUR DB USERNAME}
DB_PASSWORD= {YOUR DB PASSWORD}

SESSION_DRIVER=database
```

Running the migrations
```
php artisan migrate
```

Running laravel sail (optional)
```
#if you have docker installed you can run the following command to setup the server
./vendor/bin/sail
```

## Using the application

Accounts can be made by navigating to `{localhost}/register`  
Accounts can be logged in at `{localhost}/login`  
Login attempts can be viewed at `{localhost}/`  
Try logging in to the application, then open another (incognito) tab to log in to the same account. This should not be possible.  

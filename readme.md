## Blogcone
Blogcone is a simple blog website built with Laravel.

## Features
+ User roles and authentication
+ Blog posts (CRUD operations)
+ Like and comments
+ Tags
+ Archives
+ Admin management
+ WYSIWYG

## What's next
+ Repository pattern
+ Test Coverage
+ More features

## Tricks
The database is seeding with users below. You can use these users to test this application.

Email and Password
- admin@mail.com / password (Admin role)
- superuser1@mail.com / password (Super role)
- user1@mail.com / password (Basic role)

## Quick start
- `git clone` 
- `composer install` 
- `php artisan key:generate` 
- `php artisan migrate --seed`
- `php artisan serve`  
## Blogcone
Blogcone is a project for practice Laravel by clone the website.

## Features
+ User roles and authentication
+ Blog posts (CRUD operations)
+ Like and comments
+ Tags
+ Archives
+ Admin management
+ WYSIWYG

## Tricks
To test application the database is seeding with users:

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
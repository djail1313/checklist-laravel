# Checklist API

## Tech stacks
- PHP
- MariaDB 

## Framework
- Laravel 8.12

## Requirements
- For running Laravel please read the server requirement here [https://laravel.com/docs/8.x#server-requirements](https://laravel.com/docs/8.x#server-requirements)
- MariaDB 10.5.8

## How to setup
1. Open your database client
2. Create new database with charset *utf8mb4* and collation *utf8mb4_general_ci*
3. Get into the root project's folder using cli
4. Run `composer install`
5. Copy `.env.example` to `.env`
6. Run `php artisan key:generate`
7. Change your `DB_*` value in your `.env` file
8. Run `php artisan migrate`
9. Your application is ready

## How to run
- For simplicity just run `php artisan serve`. This command will start a development server at (http://localhost:8000)[http://localhost:8000]
- You can also configure using nginx/apache
- Or you can use valet or homestead for local environment

## How to test
- Run `composer test`

## API docs
Postman [docs/ChecklistService.postman_collection.json](docs/ChecklistService.postman_collection.json).
You just need to import the postman collection and then in environment box, please choose *No Environment*
Because i already set the environment variable in the collection.

## Authorization
I create custom guard that hardcode user's authenticable data by token.
Please use header Authorization Bearer token and put this token `Vm25gWyrS3L5PUTpUxLhTjZJZCsZGcnZxbQZGj6UTkaDfWGddV5zQeTgu6shky9wzruCn7eSdwZyPfGcYpsGLRTRttdejPJcB6q3LbfWVfR9FApDymHtZeHaxENWRZB7`

## Database seeding
- Run `php artisan db:seed`

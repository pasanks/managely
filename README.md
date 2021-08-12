# Managely | Simple project management tool

## Introduction

Managely is a project management tool with basic functions which is built on laravel framework.

## Installation

Clone the repository

```bash
git clone https://github.com/pasanks/managely.git
```

Switch to the repo folder

```bash
cd managely
```

Install all the dependencies using composer

```bash
composer install
```

Copy the example env file and make the required configuration changes in the .env file
```bash
cp .env.example .env
```

Generate a new application key
```bash
php artisan key:generate
```
Run the database migrations 

**Set the database connection in .env before migrating

```bash
php artisan migrate
```

Start the local development server

```bash
php artisan serve
```

You can now access the server at http://localhost:8000

## Security Vulnerabilities

Please review [our security policy](https://github.com/pasanks/managely/security/policy) on how to report security vulnerabilities.

## License

Managely is open-sourced software licensed under the [MIT license](LICENSE).

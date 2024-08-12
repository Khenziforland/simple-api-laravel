# Simple API Documentation

## Overview
This document outlines the setup and structure of Simple API. This apps are using :
- Laravel 11 as main framework
- MySQL for database
- Laravel Passport for authentication
- Laravel Telescope for monitoring
- Throttle limit for every endpoint with 100 request per 1 minute

## System Requirements
- PHP >= 8.2
- MySQL 5.7 or higher
- Composer for dependency management

## Installation Steps

1. **Clone the Repository**

   Clone the project and move to project directory
   ```bash
   git clone https://github.com/codenameryuu/simple-api-laravel.git
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Setup Environment**
   
   Copy the `.env.example` file to `.env` and update the database and other configurations as necessary.
   ```bash
   cp .env.example .env
   ```

4. **Apply Config**
   ```bash
   php artisan config:cache
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations and Seed the Database**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Run Application**
   ```bash
   php artisan serve
   ```

8. **Run Queue Application**
   ```bash
   php artisan queue:listen
   ```

9. **Generate Keys Passwor**
   ```bash
   php artisan passport:keys
   ```

10. **Generate Personal Access Client**
      ```bash
      php artisan passport:client --personal
      ```

## Postman Documentation
```bash
https://documenter.getpostman.com/view/14479523/2sA3JQ5fYk
```

## Contributing
Contributions to the Simple API project are welcome

## License
This Simple API is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

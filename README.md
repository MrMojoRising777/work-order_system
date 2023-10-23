<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prerequisites

Before you begin, make sure you have the following software and tools installed:

- Composer
- PHP
- Laravel
- Git

## Project setup

1. Clone the repository to your local machine:
```
git clone [https://github.com/yourusername/your-laravel-project.git](https://github.com/MrMojoRising777/work-order_system.git)
```

2. Change into the project directory:
```
cd work-order_system
```

3. Install the project dependencies using Composer:
```
composer install
```

4. Create a copy of the .env file:
```
cp .env.example .env
```

5. Generate a new application key:
```
php artisan key:generate
```

6. Configure the .env file with your database credentials and other environment-specific settings.

### Local Image Storage Setup
To use local image storage, Laravel already comes with a built-in storage system. By default, it stores files in the storage/app/public directory. To set up local image storage:

1. Create a symbolic link from the public directory to the storage directory. This will make the images accessible via a public URL:
```
php artisan storage:link
```

2. Update your .env file to set the FILESYSTEM_DRIVER to public:
```
FILESYSTEM_DRIVER=public
```

3. You can store and retrieve images using Laravel's storage system, and they will be saved in the storage/app/public directory, which is linked to the public directory.

## Running the Project

To run your Laravel project, you can use the built-in development server:
```
php artisan serve
```

This will start a local server, and you can access your application in your web browser at 'http://localhost:8000'.

## Additional information
For more information on configuring Laravel and using its features, please refer to the [Laravel documentation](https://laravel.com/docs/10.x).

Enjoy working on your Laravel project! If you have any questions or need further assistance, feel free to reach out to us.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

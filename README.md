# Laravel Authentication

Sample implementation of laravel authentication using guard and provider

## How to make authentication on laravel :

1. create new guard and provider on `config/auth.php`
2. create model for authentication and extends Authenticatable class
3. create login controller and use `Illuminate\Foundation\Auth\AuthenticatesUsers` trait
4. create middleware to redirect authenticated user and unauthenticated user
5. register the middleware to `kernel.php`
6. create route group on web.php and use the middleware

![Auth map](https://raw.githubusercontent.com/mnindrazaka/laravel-auth/master/auth%20map.jpeg)

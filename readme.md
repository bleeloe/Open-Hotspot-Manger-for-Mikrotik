# Open Hotspot Manager for Mikrotik

Hotspot Manager working with Mikrotik API.

Developed with Laravel Framework

## Instalation
Clone from repository

```
git clone https://github.com/bleeloe/Open-Hotspot-Manger-for-Mikrotik.git 
```

Run Composer, please you have to install composer first https://getcomposer.org/
```
composer update
```
Edit configuration file
edit `.env` file then change config based on your mysql configuration

host, user, password and database name.


after editing run artisan command 
```
php artisan migrate
```


Default user
username `admin@localhost.local`


password `admin`


## Features:
 - Easy add, edit dan delete user.
 - Kill Active User Online 
 - Easy ip-binding management

## Contributing
Thank you for considering contributing to Open Hotspot Manager for Mikrotik! 
Please pull request to develop branch


## License

The Open Hotspot Manager is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

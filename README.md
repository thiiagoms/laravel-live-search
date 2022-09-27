Simple live search with laravel

- [Dependencies](#Dependencies)
- [Run](#Run)

### Dependencies

- PHP 80+
- Composer
- MySQL
### Installation

1 -) Clone
```bash
$ git clone https://github.com/thiiagoms/laravel-live-search
```

2 -) Configure
```bash
$ cd laravel-live-search
$ cp .env.example .env
$ Add your MySQL credentials to `.env`

DB_CONNECTION=mysql
DB_HOST=[DATABASE-HOST]
DB_PORT=[DATABASE-PORT]
DB_DATABASE=[DATABASE-NAME]
DB_USERNAME=[DATABASE-USERNAME]
DB_PASSWORD=[DATABASE-PASSWORD]
```

3-) Install:
```bash
$ composer install
$ php artisan key:generate
$ php artisan db:migrate
$ php artisan db:seed
```

4-) Run:
```bash
$ php artisan serve
```
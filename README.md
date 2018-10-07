# wunder-registration

1. Describe possible performance optimizations for your Code.
2. Which things could be done better, than you’ve done it?


1. --
2. Would have liked if the api actually worked..


#How to run this project

Create `.env` using command `cp .env.dist .env`

Update `DATABASE_URL` and `PAYMENT_API_URL` to `.env`

Install dependencies `composer install`

Create database `php bin/console doctrine:database:create`

Execute migration `php bin/console doctrine:migrations:migrate`

Route traffic through http server to `/public/index.php` or use `php -S 127.0.0.1:8000 -t public` command.

Open browser: `127.0.0.1:8000`
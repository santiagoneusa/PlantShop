<h1 align="center">Garden of Eden</h1>

## Dependencies
This project relies on several dependencies that need to be installed before running. Make sure you have the following dependencies installed:

PHP (8.2.12)
Composer (2.6.6)
MySQL or another compatible database

- **brick/math** v0.11.0
- **carbonphp/carbon-doctrine-types** v2.1.0
- **dflydev/dot-access-data** v3.0.2
- **doctrine/inflector** v2.0.10
- **doctrine/lexer** v3.0.1
- **dragonmantank/cron-expression** v3.3.3
- **egulias/email-validator** v4.0.2
- **fakerphp/faker** v1.23.1
- **filp/whoops** v2.15.4
- **fruitcake/php-cors** v1.3.0
- **graham-campbell/result-type** v1.1.2
- **guzzlehttp/guzzle** v7.8.1
- **guzzlehttp/promises** v2.0.2
- **guzzlehttp/psr7** v2.6.2
- **guzzlehttp/uri-template** v1.0.3
- **hamcrest/hamcrest-php** v2.0.1
- **laravel/framework** v10.46.0
- **laravel/pint** v1.14.0
- **laravel/prompts** v0.1.16
- **laravel/sail** v1.28.1
- **laravel/sanctum** v3.3.3
- **laravel/serializable-closure** v1.3.3
- **laravel/tinker** v2.9.0
- **laravel/ui** v4.5.0
- **league/commonmark** v2.4.2
- **league/config** v1.2.0
- **league/flysystem** v3.24.0
- **league/flysystem-local** v3.23.1
- **league/mime-type-detection** v1.15.0
- **mockery/mockery** v1.6.7
- **monolog/monolog** v3.5.0
- **myclabs/deep-copy** v1.11.1
- **nesbot/carbon** v2.72.3
- **nette/schema** v1.3.0
- **nette/utils** v4.0.4
- **nikic/php-parser** v5.0.1
- **nunomaduro/collision** v7.10.0
- **nunomaduro/termwind** v1.15.1
- **phar-io/manifest** v2.0.4
- **phar-io/version** v3.2.1
- **phpoption/phpoption** v1.9.2
- **phpunit/php-code-coverage** v10.1.12
- **phpunit/php-file-iterator** v4.1.0
- **phpunit/php-invoker** v4.0.0
- **phpunit/php-text-template** v3.0.1
- **phpunit/php-timer** v6.0.0
- **phpunit/phpunit** v10.5.11
- **psr/clock** v1.0.0
- **psr/container** v2.0.2
- **psr/event-dispatcher** v1.0.0
- **psr/http-client** v1.0.3
- **psr/http-factory** v1.0.2
- **psr/http-message** v2.0
- **psr/log** v3.0.0
- **psr/simple-cache** v3.0.0
- **psy/psysh** v0.12.0
- **ralouphie/getallheaders** v3.0.3
- **ramsey/collection** v2.0.0
- **ramsey/uuid** v4.7.5
- **sebastian/cli-parser** v2.0.1
- **sebastian/code-unit** v2.0.0
- **sebastian/code-unit-reverse-lookup** v3.0.0
- **sebastian/comparator** v5.0.1
- **sebastian/complexity** v3.2.0
- **sebastian/diff** v5.1.1
- **sebastian/environment** v6.0.1
- **sebastian/exporter** v5.1.2
- **sebastian/global-state** v6.0.2
- **sebastian/lines-of-code** v2.0.2
- **sebastian/object-enumerator** v5.0.0
- **sebastian/object-reflector** v3.0.0
- **sebastian/recursion-context** v5.0.0
- **sebastian/type** v4.0.0
- **sebastian/version** v4.0.1
- **spatie/backtrace** v1.5.3
- **spatie/flare-client-php** v1.4.4
- **spatie/ignition** v1.12.0
- **spatie/laravel-ignition** v2.4.2
- **symfony/console** v6.4.4
- **symfony/css-selector** v7.0.3
- **symfony/deprecation-contracts** v3.4.0
- **symfony/error-handler** v6.4.4
- **symfony/event-dispatcher** v7.0.3
- **symfony/event-dispatcher-contracts** v3.4.0
- **symfony/finder** v6.4.0
- **symfony/http-foundation** v6.4.4
- **symfony/http-kernel** v6.4.5
- **symfony/mailer** v6.4.4
- **symfony/mime** v6.4.3
- **symfony/polyfill-ctype** v1.29.0
- **symfony/polyfill-intl-grapheme** v1.29.0
- **symfony/polyfill-intl-idn** v1.29.0
- **symfony/polyfill-intl-normalizer** v1.29.0
- **symfony/polyfill-mbstring** v1.29.0
- **symfony/polyfill-php72** v1.29.0
- **symfony/polyfill-php80** v1.29.0
- **symfony/polyfill-php83** v1.29.0
- **symfony/polyfill-uuid** v1.29.0
- **symfony/process** v6.4.4
- **symfony/routing** v6.4.5
- **symfony/service-contracts** v3.4.1
- **symfony/string** v7.0.4
- **symfony/translation** v6.4.4
- **symfony/translation-contracts** v3.4.1
- **symfony/uid** v6.4.3
- **symfony/var-dumper** v6.4.4
- **symfony/yaml** v7.0.3
- **theseer/tokenizer** v1.2.3
- **tijsverkoyen/css-to-inline-styles** v2.2.7
- **vlucas/phpdotenv** v5.6.0
- **voku/portable-ascii** v2.0.1
- **webmozart/assert** v1.11.0

These dependencies are essential for the project's functionality and should be kept up to date for security and compatibility reasons.

## Installation
1. Clone the repository to your local machine.
2. Navigate to the project directory in your terminal.
3. Run `composer install` to install PHP dependencies.
4. Copy the `.env.example` file to `.env` and configure your environment variables.
5. Run `php artisan key:generate` to generate a new application key.
6. Run `npm install` or `yarn install` to install JavaScript dependencies.
7. Run `npm run dev` or `yarn dev` to compile front-end assets.

## Migrations
Before running the application, you need to migrate the database schema:
Run `php artisan migrate` to apply migrations and create database tables.

## Database
This project uses MySQL as the default database. Make sure you have MySQL installed and running on your machine.
Configure your database connection details in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

## Running the Server
To start the development server, run the following command:
```
php artisan serve
```
This will start a development server at `http://127.0.0.1:8000`. You can access the application in your web browser at this URL.

## Important Note
The `.env` file contains sensitive information such as database credentials and API keys. It's essential to keep this file secure and not share it publicly. Make sure to add it to your `.gitignore` file to prevent it from being committed to version control systems.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

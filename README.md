## How to run
### Clone
    Pull Laravel/php project from git provider.
    Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
    Open the console and cd your project root directory
    Run composer install or php composer.phar install
    Run php artisan key:generate
    Run php artisan migrate
    Run php artisan db:seed to run seeders, if any.
    Run php artisan serve

### Run
Make sure that you already clone and run API (backend) on the following link
https://github.com/tantowish/backend-instacopy

Make sure that you run on different port for example (i used in this project)
front end running on route 8000
back end running on route 9000 (php artisan serve --port=9000)

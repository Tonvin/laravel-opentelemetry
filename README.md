# Laravel integrate opentelemetry

[ https://laravel.com/ ]
[ https://opentelemetry.io/ ]

## Requirements

apt install curl
apt install php8.1-xml
apt install php8.1-curl
apt install composer
composer install
php artisan key:generate
php artisan serve --host 0.0.0.0 --port 8000


test url
http://0.0.0.0:8000/metry

# Signoz

git clone -b main https://github.com/SigNoz/signoz.git
cd signoz/deploy/
./install.sh

[ https://signoz.io/blog/opentelemetry-php/ ]

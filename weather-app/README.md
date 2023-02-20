Weather-app

Pre Requisites:
1. Docker/Docker Desktop installed
2. composer

Steps:
1. Cd into weather app directory
2. composer install
3. Run ./vendor/bin/sail up and wait for containers to build
4. Check Docker Desktop to confirm containers have been built, there should be two containers mysql-1 and laravel.test-1
5. Run ./vendor/bin/sail artisan migrate 
6. Run ./vendor/bin/sail artisan db:seed
7. Run ./vendor/bin/sail npm install && npm run dev
8. Visit localhost and the weather-app should appear

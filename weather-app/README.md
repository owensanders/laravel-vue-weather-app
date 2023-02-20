Weather-app

Pre Requisites:
1. Docker/Docker Desktop installed
2. composer

Steps:
1. Cd into weather app directory
2. composer install
3. Start Docker Desktop
4. Run ./vendor/bin/sail up and wait for containers to build
5. Check Docker Desktop to confirm containers have been built, there should be two containers mysql-1 and laravel.test-1
6. Run ./vendor/bin/sail artisan migrate 
7. Run ./vendor/bin/sail artisan db:seed
8. Run ./vendor/bin/sail npm install && npm run dev
9. Visit localhost and the weather-app should appear

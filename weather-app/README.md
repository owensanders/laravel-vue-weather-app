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


If I had more time on this project I would:
- Add feature tests to improve the code reliability
- Use Vuex and make use of state management
- Create a nicer looking UI with a better UX
- Add a map that shows the location of the city you have selected to run the report on
- Make use of caching
- Would also be cool to have a job that runs via a command every few minutes on a queue and fetches the cities current weather and stores it in the Database under a new table

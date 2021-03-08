# Tested on:

`Windows 10 Home docker desktop Version 3.1.0 (51484)`

`Docker version 20.10.2, build 2291f61`

`docker-compose version 1.27.4, build 40524192`

# Functionality:

It generates ajax request and displays auto complete dropdown.

Results are displayed on block below after ajax complete - error block or weather block.

# Run:
`./install.sh`

https://github.com/GintarasSSS/ac/blob/main/install.sh

# Run DB seed for cities (it takes a while)

`docker-compose run --rm artisan db:seed --class=CitiesSeeder`

https://github.com/GintarasSSS/ac/blob/main/src/database/seeders/CitiesSeeder.php

# Run tests:

`docker-compose run --rm artisan test`

https://github.com/GintarasSSS/ac/blob/main/src/tests/Feature/CityTest.php

https://github.com/GintarasSSS/ac/blob/main/src/tests/Feature/WeatherTest.php

# Run CLI:

`docker-compose run --rm artisan weather:get London GB`

https://github.com/GintarasSSS/ac/blob/main/src/app/Console/Commands/Weather.php

# JavaScript:

https://github.com/GintarasSSS/ac/blob/main/src/public/js/app.js


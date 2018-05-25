### Campaign Manger

1. Only these are needed to be filled out in .env
```
DB_DATABASE
DB_USERNAME
DB_PASSWORD
APP_URL
```

2. import ```prg_sample.sql``` into database

3. in command line 
```
php artisan migrate
php artisan db:seed
```

4. go to <your_website_url>/admin

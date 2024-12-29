
# Welcome to SCIS Readme

## Important Credentials

The default password for all users is `scis@123`


## Database Seeding

To seed the database, run the following command:

```bash

php artisan db:seed

php artisan migrate:fresh --seed
```

## To export data via excel

The export data is queued, so you need to run the following command to export the data:
```bash
php artisan queue:work
```

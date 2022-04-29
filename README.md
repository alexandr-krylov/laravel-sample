## Test job about LARAVEL

### How to start?

```
sudo docker-compose up -d
sudo docker exec -it laravel-sample_myapp_1 composer install
sudo docker exec -it laravel-sample_myapp_1 php artisan migrate
sudo docker exec -it laravel-sample_myapp_1 php artisan db:seed --class=UserSeeder
sudo docker exec -it laravel-sample_myapp_1 php artisan db:seed --class=ArticlesSeeder
sudo docker exec -it laravel-sample_myapp_1 php artisan db:seed --class=CommentSeeder
```
Is that all right?

start explore

sorting function ``sudo docker exec -it laravel-sample_myapp_1 php artisan test``

explore with browser

start page laravel ``localhost:8000``
adding comments ``localhost:8000/comment``
news portal ``localhost:8000/news``
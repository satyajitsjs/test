cd backend 
php artisan serve

cd ..
cd frontend 
npm start


cd ..
cd lamp_php 
docker compose up --build 
if it is compolete


now backend host = http://127.0.0.1:8000/
frontend host = http://localhost:3000/
php myadmin hsot = http://localhost:9002 -> password = root , user = root


php artisan migrate

php artisan passport:install
or
php artisan passport:client --personal

.env file

PASSPORT_PERSONAL_ACCESS_CLIENT_ID = {your client id }
PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET = {your client scret}
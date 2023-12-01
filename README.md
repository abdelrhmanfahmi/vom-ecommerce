## About Task

Task shows that merchants can add their stores , products and make any product exception from vat ,,
users in system can add products to thier carts and can calculate their total price of cart by authenticated user

## Installation
1- composer install
2- php artisan jwt:secret
3- make .env file set your database name, username and password
4- php artisan migrate:fresh --seed

## APIS
** in apis i made system routing for each role that auth has auth routing , merchant has merchant routing and user has user routing handling in RouteServiceProvider file

1- First Apis About Authentication That Login and Logout Methods
2- Second Apis About Merchants and they can add stores , add products to store and set shipping cost , vat in settings system and every product can merchant update it to make it exceptional from vat

3- Third Apis About Users they can add products to their carts and they can calculate total price

## Tecnologies Used In Task
1- JWT Authentication System
2- spatie laravel/permission => used for deifne roles for each user in system

## Coding

1- using use Factory Design Pattern (repository design pattern) => make interfaces classes should follow interface methods
2- using mysql database realtionships for system
3- using seeders in system for users, stores and products
4- using policy for updataing product's vat (cannot update setting vat if products has vat already)
5- using Requests File for every post request or put
6- using newest laravel version to create update delete process in system

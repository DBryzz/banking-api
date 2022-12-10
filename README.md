# BANKING API

## 1 - About Banking API

It is a small api that simulates the basic operations of a banking system. It has role base authentication implemented with JWT.

## 2 - Tools

-   Laravel 9
-   MySQL
-   Postman
-   Git
-   Github

## 3 - Deploying Locally

-   Run the **_composer install_** to install all dependencies
-   Generate api key by running **_php artisan apikey:generate [key name]_**
-   Activate api key by running **_php artisan apikey:activate [key name]_**
-   Run **_php artisan serve to start server_**

You may also run seed to populate database

-   **_php artisan db:seed_**
-   **_php artisan db:seed --class UsersTableSeeder_**
-   **_php artisan db:seed --class ApikeysTableSeeder_**
-   **_php artisan db:seed --class AccountsTableSeeder_**
-   **_php artisan db:seed --class TransactionsTableSeeder_**

Visit api documentation (section 5) to see allowed request.

## 4 - Security

All request must be sent with an API Key in the header.

              Key: X-Authorization
              Value: JTJ8fR5wkuppNrj6wTFSIU5TJUNS45L6ANDeeWhiWvpj8bxcpV5R3Gk8lHQml9Gl

Role-base authentication with three roles

-   ROLE_ADMIN: Has access to all routes. That is **/api/secure/admin\*\***, **/api/secure/cachr\*\***, **/api/secure/cust\*\*** and **/api/login\*\***
-   ROLE_CACHIER: Does not have access to admin routes but has access to **/api/secure/cachr\*\***, **/api/secure/cust\*\*** and **/api/login\*\***
-   ROLE_CUSTOMER: Has access to **/api/secure/cust\*\*** and **/api/login\*\***

## 5 - API Documentation

Checkout the api documentation in.

              -   /banking-api-doc.postman_collection.json
              -   /banking-api-doc.html
              -   /banking-api-doc.html

## 6 - Hosting

Repository: https://github.com/DBryzz/banking-api/

Hosting Link: https://dbryzz.github.io/banking-api/

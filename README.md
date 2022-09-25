Full ecommerce application using Laravel 7 as server-side language

Demo Link: https://enricomerchandise.000webhostapp.com/

**Quick features**
- Cart Functionality - credits to darryldecode/laravelshoppingcart.
https://github.com/darryldecode/laravelshoppingcart/blob/master/src/Darryldecode/Cart/Cart.php
- Payment through Paypal or cash on delivery.
- Admin-panel using AdminLTEv3 (customized).
- User roles and privelages - ('customer', 'product_manager', 'admin').&nbsp; 
- Product related to categories and labels.&nbsp; 


## Project setup
-   Git clone https://github.com/wendell1101/EnricoMerchandise-Ecommerce-laravel.git
-   Run `composer install` in the project root
-   Create a new MySQL database named `backend_coding_test`
-   Copy the `.env.example` file to a new file called `.env`
-   Fill out the corresponding database values in the `.env` file
-   Run `php artisan migrate` in the project root
-   Run php artisan serve
-   Open postman/any other platform and test the routes

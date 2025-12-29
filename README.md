
## SSLCommerz Setup :

- Add To .env

        SSLCZ_STORE_ID=your_store_id
        SSLCZ_STORE_PASSWORD=your_store_password
        SSLCZ_TESTMODE=true


- Create Order Table

        CREATE TABLE `orders` (
          `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
          `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
          `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
          `amount` double DEFAULT NULL,
          `address` text COLLATE utf8_unicode_ci,
          `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
          `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
          `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

- Update VerifyCsrfToken from laravel app

        protected $except = [
            '/pay-via-ajax', '/success','/cancel','/fail','/ipn'
        ];


## Sandbox Environment

All the transaction made using this environment are counted as test transaction and has no effect with accounting, URL starts with https://sandbox.sslcommerz.com.

Test Credit Card Account Numbers

VISA:

    Card Number: 4111111111111111
    Exp: 12/25
    CVV: 111

Mastercard:
    
    Card Number: 5111111111111111
    Exp: 12/25
    CVV: 111
American Express:

    Card Number: 371111111111111
    Exp: 12/25
    CVV: 111
Mobile OTP: 111111 or 123456



## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**


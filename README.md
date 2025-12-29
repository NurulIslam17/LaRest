
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


## Learning Laravel



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



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

## File Import and Export

- Used Job Queue for backend processing
- Sent email to a static user for completing the importing.
- Mailtrap service is used for sending email.
- All unnecessary CSV files are deleted from the server using task scheduling; the schedule runs every five minutes.
- File Link for Employee csv  :  https://docs.google.com/spreadsheets/d/1zp1JCnt9BVCveOqUsqqgMGTWeyGCTQsvapFyC9_-sus/edit?usp=sharing


- Update .env

        MAIL_MAILER=smtp
        MAIL_HOST=your_sandbox.smtp.mailtrap.io
        MAIL_PORT=maitrap_port
        MAIL_USERNAME=maitrap_username
        MAIL_PASSWORD=maitrap_password
        MAIL_FROM_ADDRESS="hello@example.com"
        MAIL_FROM_NAME="${APP_NAME}"

  - Run in terminal :
          
        php artisan queue:work
        php artisan schedule:run or php artisan schedule:work

  - For CSV Export run in browser :
          
        http://127.0.0.1:8000/csv-export







## Title

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Subtitle

- Option 1
- option 2


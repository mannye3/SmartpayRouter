# SmartpayRouter

The SmartpayRouter package simplifies the process of integrating multiple payment gateways into your PHP or Laravel application. It provides an easy-to-use interface for processing payments, allowing developers to switch between different payment gateways based on their needs or preferences.

### Features

-   Supports multiple payment gateways (e.g., Paystack, Flutterwave).
-   Easy configuration for switching between gateways.
-   Customizable payment processing to fit various business logic.
-   Secure logging of payment attempts and results.
-   Facilitates the generation of transaction references.
-   Allows for easy testing with mock payment gateways in development environments.

## Installation

To install the SmartpayRouter package, use Composer, the PHP package manager.

````bash
composer require blinqpackage/smartpayrouter


## Installation

You can install the package via composer:

composer require blinqpackage/smartpay-router


## Help and docs

Package can be access through composer package website and Git repository:

-   [Github](https://github.com/mannye3/SmartpayRouter.git)




## Usage Intructions

```php
use Blinqpackage\SmartpayRouter\SmartPay;

// Example usage
$data = [
    'tran_ref' => 'your_transaction_reference',
    'amount' => 5000,
    'currency' => 'USD',
    'email' => 'test@email.com',
    'gateway' => 'your_transaction_gateway',
];

$result = SmartPay::processPayment($data);

```



## Accessing the Interface

You can access the interface for the package while your application is running, navigate to your http://localhost:8000/access to view the interface.

You will have access to Documentation page, Create Code Page, List all code page, Confirm Code page, Assign Code page.

## Version Guidance

-   [SmartpayRouter v1.1.0](https://github.com/mannye3/SmartpayRouter.git)
-
## Security
If you come across any security vulnerabilities in this package, we urge you to report them promptly by sending an email to aboajahemmanuel@gmail.com



## License
The SmartpayRouter package is distributed under the MIT License (MIT). For additional details, please consult the License File.

````

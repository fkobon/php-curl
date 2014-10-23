# PHP cURL

[![Build Status](http://img.shields.io/travis/sylouuu/php-curl.svg?style=flat)](https://travis-ci.org/sylouuu/php-curl)
[![Version](http://img.shields.io/packagist/v/sylouuu/php-curl.svg?style=flat)](https://packagist.org/packages/sylouuu/php-curl)
[![CodeClimate](http://img.shields.io/codeclimate/github/sylouuu/php-curl.svg?style=flat)](https://codeclimate.com/github/sylouuu/php-curl)

## Requirements

* PHP >= 5.4
* [cURL](http://php.net/manual/fr/book.curl.php/) library enabled

## Install

### Composer

```js
{
    "require": {
        "sylouuu/php-curl": "0.7.*"
    }
}
```

```php
require_once './vendor/autoload.php';
```

## Usage

```php
// Namespace shortcut
use sylouuu\Curl\Method as Curl;

// Template
$request = new Curl\<METHOD_NAME>( string $url [, array $options ] );
```

Methods are: `Get`, `Head`, `Options`, `Post`, `Put`, `Patch` and `Delete`.

### Constructor `$options`

```php
[
    'data' => [                    // Data to send, available for `Post`, `Put` and `Patch`
        'foo' => 'bar'
    ],
    'headers' => [                 // Additional headers (optional)
        'Authorization: foobar'
    ],
    'ssl' => '/cacert.pem',        // Use it for SSL (optional)
    'autoclose' => true            // Is the request must be automatically closed (optional)
]
```

### Public methods

```php
// Send a request
$request->send();

// HTTP status code
$request->getStatus();

// HTTP header
$request->getHeader();

// HTTP body response
$request->getResponse();

// Used cURL options
$request->getCurlOptions();

// Set a cURL option
$request->setCurlOption(CURLOPT_SOMETHING, $value);

// Manually close the handle (necessary when `autoclose => false` is used)
$request->close();
```

### Examples

Basic:

```php
// Namespace shortcut
use sylouuu\Curl\Method as Curl;

// Standard GET request
$request = new Curl\Get('http://domain.com');

// Send this request
$request->send();

echo $request->getResponse(); // body response
echo $request->getStatus(); // HTTP status code
```

Manual:

```php
// Namespace shortcut
use sylouuu\Curl\Method as Curl;

// Set `autoclose` option to `false`
$request = new Curl\Get('http://domain.com', [
    'autoclose' => false
]);

// Send this request
$request->send();

// Now you can retrieve a cURL info as the handle is still open
$request->getCurlInfo(CURLINFO_SOMETHING);

echo $request->getResponse();

// Manually close the handle
$request->close();
```

## Tests

On project directory:

* `composer install` to retrieve `phpunit`
* `phpunit` to run tests

## Changelog

2014-10-23 - **0.7.1**

* fixed `Post()` which didn't send data in some cases

2014-08-01 - **0.7.0** (BC break)

* moved from psr-0 autoload to psr-4
* added `Method` directory, then methods are now in `\sylouuu\Curl\Method\`

2014-05-30 - **0.6.1**

* removed exception when `data` option is not specified for `Post` `Put` and `Patch`

2014-05-22 - **0.6.0** (BC break)

* moved `url` option to the first constructor parameter

2014-05-20 - **0.5.0** (BC break)

* renamed repository from `php-rest-client` to `php-curl`
* refactored all code
* added `autoclose` option
* added the way to get/set cURL options
* added the way to get cURL info
* sources are now psr-2 compliant

2014-05-13 - **0.4.0** (BC break)

* renamed `RESTClient.class.php` to `RESTClient.php`
* moved `RESTClient.php` to `/src`
* moved `RESTClientTest.php` to `/tests`
* added `HEAD`, `OPTIONS` and `PATCH` support
* added `getHeader` method
* renamed `getJSON` to `getResponse`
* removed JSON validation
* added `sylouuu` namespace
* removed `gulp`

2014-05-09 - **0.3.0**

* added `ssl` option

2014-04-06 - **0.2.1**

* added exception if invalid JSON format returned

2014-04-04 - **0.2.0**

* new way to retrieve result
* added HTTP status code

2014-04-01 - **0.1.0**

* refactored class
* removed constructor parameter
* added unit tests

2014-03-24 - **0.0.2**

* added `$api_url` as a constructor parameter

2014-02-05 - **0.0.1**

* Initial release

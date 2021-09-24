# SendPulse REST client library

A simple SendPulse REST client library and example for PHP.

API Documentation [https://sendpulse.com/api](https://sendpulse.com/api)

### Installing

Via Composer:

```bash
composer require sendpulse/rest-api
```

### Usage

```php
<?php
require 'vendor/autoload.php';

// Without Composer (and instead of "require 'vendor/autoload.php'"):
// require("your-path/sendpulse-rest-api-php/src/ApiInterface.php");
// require("your-path/sendpulse-rest-api-php/src/ApiClient.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/TokenStorageInterface.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/FileStorage.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/SessionStorage.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/MemcachedStorage.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/MemcacheStorage.php");

use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;

// API credentials from https://login.sendpulse.com/settings/#api
define('API_USER_ID', '');
define('API_SECRET', '');
define('PATH_TO_ATTACH_FILE', __FILE__);

$SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());

/*
 * Example: Get Mailing Lists
 */
var_dump($SPApiClient->listAddressBooks());

/*
 * Example: Add new email to mailing lists
 */
 $bookID = 123;
 $emails = array(
    array(
        'email' => 'subscriber@example.com',
        'variables' => array(
            'phone' => '+12345678900',
            'name' => 'User Name',
        )
    )
);
 $additionalParams = array(
   'confirmation' => 'force',
   'sender_email' => 'sender@example.com',
);
 // With confirmation
var_dump($SPApiClient->addEmails($bookID, $emails, $additionalParams));

// Without confirmation
var_dump($SPApiClient->addEmails($bookID, $emails));

/*
 * Example: Send mail using SMTP
 */
$email = array(
    'html' => '<p>Hello!</p>',
    'text' => 'Hello!',
    'subject' => 'Mail subject',
    'from' => array(
        'name' => 'John',
        'email' => 'sender@example.com',
    ),
    'to' => array(
        array(
            'name' => 'Subscriber Name',
            'email' => 'subscriber@example.com',
        ),
    ),
    'bcc' => array(
        array(
            'name' => 'Manager',
            'email' => 'manager@example.com',
        ),
    ),
    'attachments' => array(
        'file.txt' => file_get_contents(PATH_TO_ATTACH_FILE),
    ),
);
var_dump($SPApiClient->smtpSendMail($email));

/*
 * Example: create new push
 */
$task = array(
    'title' => 'Hello!',
    'body' => 'This is my first push message',
    'website_id' => 1,
    'ttl' => 20,
    'stretch_time' => 0,
);

// This is optional
$additionalParams = array(
    'link' => 'http://yoursite.com',
    'filter_browsers' => 'Chrome,Safari',
    'filter_lang' => 'en',
    'filter' => '{"variable_name":"some","operator":"or","conditions":[{"condition":"likewith","value":"a"},{"condition":"notequal","value":"b"}]}',
);
var_dump($SPApiClient->createPushTask($task, $additionalParams));
```

### Usage Automation360

```php
<?php

require 'vendor/autoload.php';

use Sendpulse\RestApi\Automation360;

// https://login.sendpulse.com/emailservice/events/
$eventHash = 'EVENT_HASH';
$email = 'email@domain.com';
$phone = '380931112233';
$variables = [
    'user_id' => 123123,
    'event_date' => date('Y-m-d'),
    'firstname' => 'Name',
    'lastname' => 'Family',
    'age' => 23
];
$automationClient =  new Automation360($eventHash);
$result = $automationClient->sendEventToSendpulse($email, $phone, $variables);

var_dump($result);
```

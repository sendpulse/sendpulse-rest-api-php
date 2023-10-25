SendPulse REST client library
================

[![License](http://poser.pugx.org/sendpulse/rest-api/license)](https://packagist.org/packages/sendpulse/rest-api)
[![Total Downloads](http://poser.pugx.org/sendpulse/rest-api/downloads)](https://packagist.org/packages/sendpulse/rest-api)
[![PHP Version Require](http://poser.pugx.org/sendpulse/rest-api/require/php)](https://packagist.org/packages/sendpulse/rest-api)

A simple SendPulse REST client library and example for PHP.

API Documentation [https://sendpulse.com/api](https://sendpulse.com/api)


### Requirements

- php: >=7.1.0
- ext-json: *
- ext-curl: *


### Installation

Via Composer:

```bash
composer require sendpulse/rest-api
```

### Example

```php
<?php
require 'vendor/autoload.php';

// Without Composer (and instead of "require 'vendor/autoload.php'"):
// require("your-path/sendpulse-rest-api-php/src/Contracts/ApiInterface.php");
// require("your-path/sendpulse-rest-api-php/src/ApiClient.php");
// require("your-path/sendpulse-rest-api-php/src/Contracts/TokenStorageInterface.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/FileStorage.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/SessionStorage.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/MemcachedStorage.php");
// require("your-path/sendpulse-rest-api-php/src/Storage/MemcacheStorage.php");

use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;
use Sendpulse\RestApi\ApiClientException;

// API credentials from https://login.sendpulse.com/settings/#api
define('API_USER_ID', '');
define('API_SECRET', '');
define('PATH_TO_ATTACH_FILE', __FILE__);

$apiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());


/*
 * Send GET request
 * 
 * Example: Get a List of Mailing Lists
 */
try {
    $addressBooks = $apiClient->get('addressbooks', [
        'limit' => 100,
        'offset' => 0
    ]);

    var_dump($addressBooks);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}


/*
 * Send POST request 
 * 
 * Example: Add new email to mailing lists
 */
try {
    $addEmailsResult = $apiClient->post('addressbooks/33333/emails', [
        'emails' => [
            [
                'email' => 'test_email@test.com',
                'variables' => [
                    'phone' => '+123456789',
                    'my_var' => 'my_var_value'
                ]
            ], [
                'email' => 'email_test@test.com',
                'variables' => [
                    'phone' => '+987654321',
                    'my_var' => 'my_var_value'
                ]
            ]
        ]
    ]);

    var_dump($addEmailsResult);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}
 
 
/*
 * Send PUT request 
 * 
 * Example: Edit a Mailing List
 */
try {
    $addEmailsResult = $apiClient->put('addressbooks/33333', [
        'name' => "New Name"
    ]);

    var_dump($addEmailsResult);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}


/*
 * Send PATCH request 
 * 
 * Example: Edit Scheduled Campaign
 */
try {
    $editScheduledCampaignResult = $apiClient->patch('campaigns/333333', [
        "name" => "My_API_campaign",
        "sender_name" => "sender",
        "sender_email" => "sender@test.com",
        "subject" => "Hello customer",
        "template_id" => 351594,
        "send_date" => "2023-10-21 11:45:00"
    ]);

    var_dump($editScheduledCampaignResult);
} catch (\Sendpulse\RestApi\ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}


/*
 * Send DELETE request 
 * 
 * Example: Delete Emails from a Mailing List
 */
try {
    $removeEmailsResult = $apiClient->delete('addressbooks/33333/emails', [
        'emails' => ['test@test.com']
    ]);

    var_dump($removeEmailsResult);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}


/*
 * Example: Start Automation360 event
 */
try {
    $startEventResult = $apiClient->post('events/name/my_event_name', [
        "email" => "test@test.com",
        "phone" => "+123456789",
        "products" => [
            [
                "id" => "id value",
                "name" => "name value"
            ]
        ]
    ]);

    var_dump($startEventResult);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}


/**
 * Example: Crm create a new deal
 */
try {
    $crmCreateDeal = $apiClient->post('crm/v1/deals', [
        "pipelineId" => 0,
        "stepId" => 0,
        "responsibleId" => 0,
        "name" => "string",
        "price" => 0,
        "currency" => "string",
        "sourceId" => 0,
        "contact" => [
            0
        ],
        "attributes" => [
            [
                "attributeId" => 0,
                "value" => "string"
            ]
        ],
        "attachments" => [
            "https://link-to-file.com/file.jpg"
        ]
    ]);

    var_dump($crmCreateDeal);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}


/**
 * Example: Whatsapp send a template message to the specified contact
 */
try {
    $sendTemplateByPhoneResult = $apiClient->post('whatsapp/contacts/sendTemplateByPhone', [
        "bot_id" => "xxxxxxxxxxxxxxxxxxxxxxxx",
        "phone" => "380931112233",
        "template" => [
            "name" => "thanks_for_buying",
            "language" => [
                "code" => "en"
            ],
            "components" => []
        ]
    ]);

    var_dump($sendTemplateByPhoneResult);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}


```


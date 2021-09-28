<?php

/*
 * SendPulse REST API Usage Example
 *
 * Documentation
 * https://login.sendpulse.com/manual/rest-api/
 * https://sendpulse.com/api
 *
 * Settings
 * https://login.sendpulse.com/settings/#api
 */

use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;

define('API_USER_ID', '');
define('API_SECRET', '');
define('PATH_TO_ATTACH_FILE', __FILE__);

$SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());

// Get Mailing Lists list example
var_dump($SPApiClient->listAddressBooks());

// Send mail using SMTP
$email = array(
    'html' => '<p>Hello!</p>',
    'text' => 'text',
    'subject' => 'Mail subject',
    'from' => array(
        'name' => 'John',
        'email' => 'John@domain.com',
    ),
    'to' => array(
        array(
            'name' => 'Client',
            'email' => 'client@domain.com',
        ),
    ),
    'bcc' => array(
        array(
            'name' => 'Manager',
            'email' => 'manager@domain.com',
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
    'stretch_time' => 10,
);
// This is optional
$additionalParams = array(
    'link' => 'http://yoursite.com',
    'filter_browsers' => 'Chrome,Safari',
    'filter_lang' => 'en',
    'filter' => '{"variable_name":"some","operator":"or","conditions":[{"condition":"likewith","value":"a"},{"condition":"notequal","value":"b"}]}',
);
var_dump($SPApiClient->createPushTask($task, $additionalParams));


/*
 * SMS methods
 */


// Add phones to book
var_dump($SPApiClient->addPhones(BOOK_ID, ['111111111111']));

// Add phones with variables to book
$data = [
    '111111111111' => [
        [
            [
                'name' => 'var_value',
                'type' => 'string',
                'value' => 'variable value',
            ]
        ]
    ]
];
var_dump($SPApiClient->addPhonesWithVariables(BOOK_ID, $data));

// Update variables
$phones = ['111111111111'];
$variables = [
    [
        'name' => 'var_value',
        'type' => 'string',
        'value' => 'new value',
    ]
];
var_dump($SPApiClient->updatePhoneVaribales(BOOK_ID, $phones, $variables));

// Remove phones
var_dump($SPApiClient->deletePhones(BOOK_ID, ['111111111111']));

// Get phone info
var_dump($SPApiClient->getPhoneInfo(BOOK_ID, '111111111111'));

// Add phones to blacklist
var_dump($SPApiClient->addPhonesToBlacklist(['111111111111']));

// Remove phones from blacklist
var_dump($SPApiClient->removePhonesFromBlacklist(['111111111111']));

// List phones from blacklist
var_dump($SPApiClient->getPhonesFromBlacklist());

// Create SMS campaign by book
$params = [
    'sender' => 'testsender',
    'body' => 'test'
];
$additionalParams = [
    'transliterate' => 0
];
var_dump($SPApiClient->sendSmsByBook(BOOK_ID, $params, $additionalParams));

// Create SMS campaign by phone list
$phones = ['111111111111'];
$params = [
    'sender' => 'testsender',
    'body' => 'test'
];
$additionalParams = [
    'transliterate' => 0
];
var_dump($SPApiClient->sendSmsByList($phones, $params, $additionalParams));

// List SMS campaigns
$params = [ // optional params
    'dateFrom' => '2018-01-31 00:00:00',
    'dateTo' => '2018-10-31 23:59:59'
];
var_dump($SPApiClient->listSmsCampaigns($params));

// Get information about SMS campaign
var_dump($SPApiClient->getSmsCampaignInfo(CAMPAIGN_ID));

// Cancel SMS campaign
var_dump($SPApiClient->cancelSmsCampaign(CAMPAIGN_ID));

// Calculate SMS campaign cost by book or phone list
$params = [
    'addressBookId' => BOOK_ID, // or 'phones' => ['111111111111']
    'sender' => 'testsender',
    'body' => 'test'
];
var_dump($SPApiClient->getSmsCampaignCost($params));

// Delete sms campaign
var_dump($SPApiClient->deleteSmsCampaign(CAMPAIGN_ID));

/*
 * Automation360 methods
 */

// Start event automation360
$eventName = 'registration';
$variables = [
    "email" => "test1@test1.com",
    "phone" => "+123456789",
    "var_1" => "var_1_value"
];

var_dump($SPApiClient->startEventAutomation360($eventName,$variables));

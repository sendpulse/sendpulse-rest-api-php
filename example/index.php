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

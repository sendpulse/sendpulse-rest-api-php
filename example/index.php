<?php

/*
 * SendPulse REST API Usage Example
 *
 * Documentation
 * https://login.sendpulse.com/manual/rest-api/
 * https://sendpulse.com/api
 */

// https://login.sendpulse.com/settings/#api
use Sendpulse\RestAPI\ApiClient;
use Sendpulse\RestAPI\Storage\FileStorage;

define('API_USER_ID', '');
define('API_SECRET', '');
define('PATH_TO_ATTACH_FILE', __FILE__);

$SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());

// Get Mailing Lists list example
var_dump($SPApiClient->listAddressBooks());

// Send mail using SMTP
$email = array(
    'html'        => '<p>Hello, Maks!</p>',
    'text'        => 'Hello, Maks!',
    'subject'     => 'Mail subject',
    'from'        => array(
        'name'  => 'Maks',
        'email' => 'm.ustymenko@gmail.com',
    ),
    'to'          => array(
        array(
            'name'  => 'Maksym Ustymenko',
            'email' => 'm.ustymenko@sendpulse.com',
        ),
    ),
    'bcc'         => array(),
    'attachments' => array(
        'index.php' => file_get_contents(PATH_TO_ATTACH_FILE),
    ),
);
var_dump($SPApiClient->smtpSendMail($email));


/*
 * Example: create new push
 */

$task = array(
    'title'        => 'Hello!',
    'body'         => 'This is my first push message',
    'website_id'   => 1,
    'ttl'          => 20,
    'stretch_time' => 10,
);
// This is optional
$additionalParams = array(
    'link'            => 'http://yoursite.com',
    'filter_browsers' => 'Chrome,Safari',
    'filter_lang'     => 'en',
    'filter'          => '{"variable_name":"some","operator":"or","conditions":[{"condition":"likewith","value":"a"},{"condition":"notequal","value":"b"}]}',
);
// var_dump($SPApiProxy->createPushTask($task, $additionalParams));

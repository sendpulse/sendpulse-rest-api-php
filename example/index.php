<?php

/*
 * SendPulse REST API Usage Example
 *
 * Documentation
 * https://sendpulse.com/api
 *
 * Settings
 * https://login.sendpulse.com/settings/#api
 */

use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;
use Sendpulse\RestApi\ApiClientException;

define('API_USER_ID', '');
define('API_SECRET', '');
define('PATH_TO_ATTACH_FILE', __FILE__);

try {
    $apiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());
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
 * Catch error response
 */
try {
    $errorResponse = $apiClient->get('addressbooks/404');
    var_dump($errorResponse);
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
 * Get a List of Mailing Lists
 * @link https://sendpulse.com/integrations/api/bulk-email#lists-list
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


/**
 * Add Emails to a Mailing List
 * @link https://sendpulse.com/integrations/api/bulk-email#add-email
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


/**
 * SMTP: send mail
 * @link https://sendpulse.com/integrations/api/smtp#send-email-smtp
 */
try {
    $smtpSendMailResult = $apiClient->post('smtp/emails', [
        'email' => [
            'html' => base64_encode('<p>Hello!</p>'),
            'text' => 'text',
            'subject' => 'Mail subject',
            'from' => [
                'name' => 'API package test',
                'email' => 'from@test.com',
            ],
            'to' => [
                [
                    'name' => 'to',
                    'email' => 'to@test.com',
                ]
            ],
            'bcc' => [
                [
                    'name' => 'bcc',
                    'email' => 'bcc@test.com',
                ]
            ],
            'attachments_binary' => [
                'attach_image.jpg' => base64_encode(file_get_contents('../storage/attach_image.jpg'))
            ],
        ]
    ]);

    var_dump($smtpSendMailResult);
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
 * Edit a Mailing List
 * @link https://sendpulse.com/integrations/api/bulk-email#edit-list
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


/**
 * Edit Scheduled Campaign
 * @link https://sendpulse.com/integrations/api/bulk-email#edit-campaign
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
 * Start A360 event
 * @link https://login.sendpulse.com/emailservice/events/
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
 * Delete Emails from a Mailing List
 * @link https://sendpulse.com/integrations/api/bulk-email#delete-email
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


/**
 * Send SMS
 * @link https://sendpulse.com/integrations/api/bulk-sms#create-campaign-to-list
 */
try {
    $smsSendResult = $apiClient->post('sms/send', [
        "sender" => "my_sender",
        "phones" => [
            380683850429
        ],
        "body" => "api"
    ]);

    var_dump($smsSendResult);
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
 * Crm get pipelines
 * @link https://sendpulse.com/integrations/api/crm#/Pipelines/get_pipelines
 */
try {
    $crmPipelines = $apiClient->get('crm/v1/pipelines');

    var_dump($crmPipelines);
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
 * Crm get contacts
 * @link https://sendpulse.com/integrations/api/crm#/Contacts/post_contacts_get_list
 */
try {
    $crmContacts = $apiClient->post('crm/v1/contacts/get-list');

    var_dump($crmContacts);
} catch (ApiClientException $e) {
    var_dump([
        'message' => $e->getMessage(),
        'http_code' => $e->getCode(),
        'response' => $e->getResponse(),
        'curl_errors' => $e->getCurlErrors(),
        'headers' => $e->getHeaders()
    ]);
}
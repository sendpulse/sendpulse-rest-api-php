<?php

declare(strict_types=1);

/**
 * Operation map fragment for "smtp" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 17 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'smtp.bounces.getSmtpBouncesDay' => [
        'method' => 'GET',
        'path'   => '/smtp/bounces/day',
        'params' => ['date' => 'string', 'limit' => 'int', 'offset' => 'int'],
    ],
    'smtp.bounces.getSmtpBouncesTotal' => [
        'method' => 'GET',
        'path'   => '/smtp/bounces/day/total',
        'params' => [],
    ],
    'smtp.configuration.addSmtpDomain' => [
        'method' => 'POST',
        'path'   => '/v2/email-service/smtp/sender_domains/{domain}',
        'params' => ['domain' => 'string!'],
    ],
    'smtp.configuration.addSmtpSender' => [
        'method' => 'POST',
        'path'   => '/senders',
        'params' => [],
    ],
    'smtp.configuration.getSmtpAllowedDomains' => [
        'method' => 'GET',
        'path'   => '/v2/email-service/smtp/sender_domains',
        'params' => [],
    ],
    'smtp.configuration.getSmtpIps' => [
        'method' => 'GET',
        'path'   => '/smtp/ips',
        'params' => [],
    ],
    'smtp.configuration.getSmtpSenders' => [
        'method' => 'GET',
        'path'   => '/smtp/senders',
        'params' => [],
    ],
    'smtp.emails.getSmtpEmailInfo' => [
        'method' => 'GET',
        'path'   => '/smtp/emails/{id}',
        'params' => ['id' => 'string!'],
    ],
    'smtp.emails.getSmtpEmails' => [
        'method' => 'GET',
        'path'   => '/smtp/emails',
        'params' => ['limit' => 'int', 'offset' => 'int', 'from' => 'string', 'to' => 'string', 'sender' => 'string', 'recipient' => 'string', 'country' => 'string'],
    ],
    'smtp.emails.getSmtpEmailsBatchInfo' => [
        'method' => 'POST',
        'path'   => '/smtp/emails/info',
        'params' => [],
    ],
    'smtp.emails.getSmtpEmailsTotal' => [
        'method' => 'GET',
        'path'   => '/smtp/emails/total',
        'params' => [],
    ],
    'smtp.emails.sendSmtpEmail' => [
        'method' => 'POST',
        'path'   => '/smtp/emails',
        'params' => [],
    ],
    'smtp.unsubscribe.getSmtpUnsubscribed' => [
        'method' => 'GET',
        'path'   => '/smtp/unsubscribe',
        'params' => ['date' => 'string', 'limit' => 'int', 'offset' => 'int'],
    ],
    'smtp.unsubscribe.removeSmtpUnsubscribe' => [
        'method' => 'DELETE',
        'path'   => '/smtp/unsubscribe',
        'params' => [],
    ],
    'smtp.unsubscribe.resubscribeSmtpRecipient' => [
        'method' => 'POST',
        'path'   => '/smtp/resubscribe',
        'params' => [],
    ],
    'smtp.unsubscribe.searchSmtpUnsubscribe' => [
        'method' => 'GET',
        'path'   => '/smtp/unsubscribe/search',
        'params' => ['email' => 'string!'],
    ],
    'smtp.unsubscribe.unsubscribeSmtpRecipients' => [
        'method' => 'POST',
        'path'   => '/smtp/unsubscribe',
        'params' => [],
    ],
];

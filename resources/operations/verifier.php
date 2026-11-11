<?php

declare(strict_types=1);

/**
 * Operation map fragment for "verifier" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 9 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'verifier.mailingListVerification.getVerificationProgress' => [
        'method' => 'GET',
        'path'   => '/verifier-service/get-progress',
        'params' => ['id' => 'int!'],
    ],
    'verifier.mailingListVerification.getVerificationResults' => [
        'method' => 'GET',
        'path'   => '/verifier-service/check',
        'params' => ['id' => 'int!', 'start' => 'int', 'count' => 'int'],
    ],
    'verifier.mailingListVerification.getVerifiedLists' => [
        'method' => 'GET',
        'path'   => '/verifier-service/check-list',
        'params' => ['start' => 'int', 'count' => 'int'],
    ],
    'verifier.mailingListVerification.verifyMailingList' => [
        'method' => 'POST',
        'path'   => '/verifier-service/send-list-to-verify',
        'params' => [],
    ],
    'verifier.reports.createVerificationReport' => [
        'method' => 'POST',
        'path'   => '/verifier-service/make-report',
        'params' => [],
    ],
    'verifier.reports.downloadVerificationReport' => [
        'method' => 'GET',
        'path'   => '/verifier-service/get-report',
        'params' => ['id' => 'int!', 'format' => 'int'],
    ],
    'verifier.reports.viewVerificationReport' => [
        'method' => 'GET',
        'path'   => '/verifier-service/check-report',
        'params' => ['id' => 'int!', 'format' => 'int'],
    ],
    'verifier.singleEmailVerification.getSingleVerificationResult' => [
        'method' => 'GET',
        'path'   => '/verifier-service/get-single-result',
        'params' => ['email' => 'string!'],
    ],
    'verifier.singleEmailVerification.verifySingleEmail' => [
        'method' => 'POST',
        'path'   => '/verifier-service/send-single-to-verify',
        'params' => [],
    ],
];

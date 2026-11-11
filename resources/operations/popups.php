<?php

declare(strict_types=1);

/**
 * Operation map fragment for "popups" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 15 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'popups.popup.deletePopup' => [
        'method' => 'DELETE',
        'path'   => '/v2/pop-ups/popups/{popupId}',
        'params' => ['popupId' => 'string!'],
    ],
    'popups.popup.listPopupConditions' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/popups/conditions',
        'params' => [],
    ],
    'popups.popup.listPopups' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/popups/list/{projectId}',
        'params' => ['projectId' => 'string!'],
    ],
    'popups.popup.listQuizPopups' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/popups/list/quiz/{projectId}',
        'params' => ['projectId' => 'string!'],
    ],
    'popups.popup.setPopupState' => [
        'method' => 'POST',
        'path'   => '/v2/pop-ups/popups/{popupId}/set-state',
        'params' => ['popupId' => 'string!'],
    ],
    'popups.popupStatistic.getAggregatedNpsStatistics' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/statistics/nps/{popupId}/aggregated',
        'params' => ['popupId' => 'string!'],
    ],
    'popups.popupStatistic.getNpsStatistics' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/statistics/nps/{popupId}',
        'params' => ['popupId' => 'string!'],
    ],
    'popups.popupStatistic.getPopupStatistics' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/statistics/popup/{popupId}',
        'params' => ['popupId' => 'string!'],
    ],
    'popups.project.createProject' => [
        'method' => 'POST',
        'path'   => '/v2/pop-ups/widgets',
        'params' => [],
    ],
    'popups.project.listProjects' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/widgets/list',
        'params' => [],
    ],
    'popups.projectStatistic.getProjectStatistics' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/statistics/widget/{projectId}',
        'params' => ['projectId' => 'string!'],
    ],
    'popups.subscribers.getSubscriber' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/subscribers/get/{subscriberId}',
        'params' => ['subscriberId' => 'int!'],
    ],
    'popups.subscribers.listSubscribersByPopup' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/subscribers/by-popup/{popupId}',
        'params' => ['popupId' => 'string!'],
    ],
    'popups.subscribers.listSubscribersByProject' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/subscribers/by-project/{projectId}',
        'params' => ['projectId' => 'string!'],
    ],
    'popups.tariff.getTariffLimits' => [
        'method' => 'GET',
        'path'   => '/v2/pop-ups/tariff/limits',
        'params' => [],
    ],
];

<?php

declare(strict_types=1);

/**
 * Operation map fragment for "a360" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 45 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'a360.autoresponders.autorespondersConversions' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions',
        'params' => ['id' => 'int!'],
    ],
    'a360.autoresponders.autorespondersConversionsGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/group-stat-filtered',
        'params' => ['id' => 'int!'],
    ],
    'a360.autoresponders.autorespondersGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/group-stat-filtered',
        'params' => ['id' => 'int!'],
    ],
    'a360.autoresponders.autorespondersIndex' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}',
        'params' => ['id' => 'int!'],
    ],
    'a360.autoresponders.autorespondersList' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/list',
        'params' => [],
    ],
    'a360.autoresponders.autorespondersTotalStats' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/total-stats',
        'params' => ['id' => 'int!', 'flow_type' => 'string', 'deleted' => 'string'],
    ],
    'a360.autorespondersConversions.autorespondersConversionsAll' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/all',
        'params' => ['id' => 'int!'],
    ],
    'a360.autorespondersConversions.autorespondersConversionsGoal' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/goal/{goalId}',
        'params' => ['id' => 'int!', 'goalId' => 'int!'],
    ],
    'a360.autorespondersConversions.autorespondersConversionsGoals' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/goal',
        'params' => ['id' => 'int!'],
    ],
    'a360.autorespondersConversions.autorespondersConversionsMainTrigger' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/maintrigger',
        'params' => ['id' => 'int!'],
    ],
    'a360.autorespondersConversions.conversionsAllGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/all/group-stat-filtered',
        'params' => ['id' => 'int!'],
    ],
    'a360.autorespondersConversions.conversionsGoalGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/goal/{goalId}/group-stat-filtered',
        'params' => ['id' => 'int!', 'goalId' => 'int!'],
    ],
    'a360.autorespondersConversions.conversionsGoalsGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/goals/group-stat-filtered',
        'params' => ['id' => 'int!'],
    ],
    'a360.autorespondersConversions.conversionsMainTriggerGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/autoresponders/{id}/conversions/list/maintrigger/group-stat-filtered',
        'params' => ['id' => 'int!'],
    ],
    'a360.events.eventsDeleteLog' => [
        'method' => 'POST',
        'path'   => '/a360/events/delete-log',
        'params' => [],
    ],
    'a360.statsAction.statsActionGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/action/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsAction.statsActionGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/action/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsCondition.statsTriggerGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/trigger/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsCondition.statsTriggerGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/trigger/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsEmail.statsEmailAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/email/{elementId}/addresses',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsEmail.statsEmailGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/email/{elementId}/group-stat',
        'params' => ['emails[]' => 'array', 'sent_date_from' => 'string', 'sent_date_to' => 'string', 'elementId' => 'string!'],
    ],
    'a360.statsEmail.statsEmailGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/email/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsFilter.statsFilterGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/filter/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsFilter.statsFilterGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/filter/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsFlowOperator.statsFlowOperatorAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/flow-operator/{elementId}/addresses',
        'params' => ['sortField' => 'string', 'sortDirection' => 'string', 'elementId' => 'string!'],
    ],
    'a360.statsGoal.statsGoalGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/goal/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsGoal.statsGoalGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/goal/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsMainTrigger.statsMainTriggerAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/main-trigger/{elementId}/addresses',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsMainTrigger.statsMainTriggerGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/main-trigger/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsMainTrigger.statsMainTriggerGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/main-trigger/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsMessenger.statsMessengerAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/messenger/{elementId}/addresses',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsMessenger.statsMessengerGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/messenger/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsMessenger.statsMessengerGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/messenger/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsPause.statsPauseAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/pause/{elementId}/addresses',
        'params' => ['limit' => 'int!', 'sortField' => 'string', 'elementId' => 'string!'],
    ],
    'a360.statsPause.statsPauseGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/pause/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsPause.statsPauseGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/pause/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsPush.statsPushAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/push/{elementId}/addresses',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsPush.statsPushGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/push/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsPush.statsPushGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/push/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsSMS.statsSmsAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/sms/{elementId}/addresses',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsSMS.statsSmsGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/sms/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsSMS.statsSmsGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/sms/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsViber.statsViberAddresses' => [
        'method' => 'GET',
        'path'   => '/a360/stats/viber/{elementId}/addresses',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsViber.statsViberGroupStat' => [
        'method' => 'GET',
        'path'   => '/a360/stats/viber/{elementId}/group-stat',
        'params' => ['elementId' => 'string!'],
    ],
    'a360.statsViber.statsViberGroupStatFiltered' => [
        'method' => 'GET',
        'path'   => '/a360/stats/viber/{elementId}/group-stat-filtered',
        'params' => ['elementId' => 'string!'],
    ],
];

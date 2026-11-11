<?php

declare(strict_types=1);

/**
 * Operation map fragment for "chatbot" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 19 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'chatbot.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/chatbots/account',
        'params' => [],
    ],
    'chatbot.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/chatbots/bots',
        'params' => [],
    ],
    'chatbot.dialogLabels.assignDialogLabels' => [
        'method' => 'POST',
        'path'   => '/chatbots/dialog-labels/assign',
        'params' => [],
    ],
    'chatbot.dialogLabels.createDialogLabel' => [
        'method' => 'POST',
        'path'   => '/chatbots/dialog-labels',
        'params' => [],
    ],
    'chatbot.dialogLabels.deleteDialogLabel' => [
        'method' => 'DELETE',
        'path'   => '/chatbots/dialog-labels/{dialog_label}',
        'params' => ['dialog_label' => 'string!'],
    ],
    'chatbot.dialogLabels.getDialogLabels' => [
        'method' => 'GET',
        'path'   => '/chatbots/dialog-labels',
        'params' => [],
    ],
    'chatbot.dialogLabels.updateDialogLabel' => [
        'method' => 'PUT',
        'path'   => '/chatbots/dialog-labels/{dialog_label}',
        'params' => ['dialog_label' => 'string!'],
    ],
    'chatbot.dialogs.filterDialogs' => [
        'method' => 'POST',
        'path'   => '/chatbots/dialogs',
        'params' => [],
    ],
    'chatbot.dialogs.getDialogs' => [
        'method' => 'GET',
        'path'   => '/chatbots/dialogs',
        'params' => ['search_after' => 'string'],
    ],
    'chatbot.operatorGroups.addOperatorGroupMembers' => [
        'method' => 'POST',
        'path'   => '/chatbots/operator-groups/{operator_group}/members',
        'params' => ['operator_group' => 'string!'],
    ],
    'chatbot.operatorGroups.createOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/chatbots/operator-groups',
        'params' => [],
    ],
    'chatbot.operatorGroups.deleteOperatorGroup' => [
        'method' => 'DELETE',
        'path'   => '/chatbots/operator-groups/{operator_group}',
        'params' => ['operator_group' => 'string!'],
    ],
    'chatbot.operatorGroups.deleteOperatorGroupMember' => [
        'method' => 'DELETE',
        'path'   => '/chatbots/operator-groups/{operator_group}/members/{operator_group_member}',
        'params' => ['operator_group' => 'string!', 'operator_group_member' => 'string!'],
    ],
    'chatbot.operatorGroups.getOperatorGroupMembers' => [
        'method' => 'GET',
        'path'   => '/chatbots/operator-groups/{operator_group}/members',
        'params' => ['operator_group' => 'string!'],
    ],
    'chatbot.operatorGroups.getOperatorGroups' => [
        'method' => 'GET',
        'path'   => '/chatbots/operator-groups',
        'params' => [],
    ],
    'chatbot.operatorGroups.updateOperatorGroup' => [
        'method' => 'PUT',
        'path'   => '/chatbots/operator-groups/{operator_group}',
        'params' => ['operator_group' => 'string!'],
    ],
    'chatbot.operators.getOperatorCurrentStatistics' => [
        'method' => 'POST',
        'path'   => '/chatbots/operators/{operator}/statistics/current',
        'params' => ['operator' => 'int!'],
    ],
    'chatbot.operators.getOperatorPeriodStatistics' => [
        'method' => 'GET',
        'path'   => '/chatbots/operators/{operator}/statistics/period',
        'params' => ['operator' => 'int!', 'from' => 'string', 'to' => 'string'],
    ],
    'chatbot.operators.getOperators' => [
        'method' => 'GET',
        'path'   => '/chatbots/operators',
        'params' => [],
    ],
];

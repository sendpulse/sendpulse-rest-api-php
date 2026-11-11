<?php

declare(strict_types=1);

/**
 * Operation map fragment for "file-manager" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 9 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'file-manager.directory.createDirectory' => [
        'method' => 'POST',
        'path'   => '/fm/public/v1/directory',
        'params' => [],
    ],
    'file-manager.directory.getDirectoryContents' => [
        'method' => 'GET',
        'path'   => '/fm/public/v1/directory/{path}',
        'params' => ['path' => 'string!'],
    ],
    'file-manager.directory.getDirectoryTree' => [
        'method' => 'GET',
        'path'   => '/fm/public/v1/directory',
        'params' => [],
    ],
    'file-manager.directory.getStorageStats' => [
        'method' => 'GET',
        'path'   => '/fm/public/v1/directory/size',
        'params' => [],
    ],
    'file-manager.directory.searchFiles' => [
        'method' => 'GET',
        'path'   => '/fm/public/v1/directory/find',
        'params' => ['search' => 'string!', 'path' => 'string!'],
    ],
    'file-manager.file.checkFileExists' => [
        'method' => 'POST',
        'path'   => '/fm/public/v1/file/exist',
        'params' => [],
    ],
    'file-manager.file.deleteFile' => [
        'method' => 'DELETE',
        'path'   => '/fm/public/v1/file',
        'params' => [],
    ],
    'file-manager.file.filterFiles' => [
        'method' => 'POST',
        'path'   => '/fm/public/v1/file/filter',
        'params' => [],
    ],
    'file-manager.file.uploadFile' => [
        'method' => 'POST',
        'path'   => '/fm/public/v1/file',
        'params' => [],
    ],
];

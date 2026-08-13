<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->exclude('Generated');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12'                       => true,
        'strict_param'                 => true,
        'declare_strict_types'         => true,
        'array_syntax'                 => ['syntax' => 'short'],
        'ordered_imports'              => ['sort_algorithm' => 'alpha'],
        'no_unused_imports'            => true,
        'trailing_comma_in_multiline'  => true,
        'single_quote'                 => true,
        'blank_line_before_statement'  => true,
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true);

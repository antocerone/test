<?php
$rootPath = realpath(__DIR__ . '/../../');

$finder = (new PhpCsFixer\Finder())
    ->in($rootPath)
    ->exclude(['var', 'vendor', 'ci']);

//(new Symfony\Component\Filesystem\Filesystem())->mkdir($rootPath . '/var/cache-ci');

return (new PhpCsFixer\Config())
    ->setCacheFile($rootPath . '/var/cache-ci/.php_cs.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        'array_indentation' => true,
        'method_chaining_indentation' => true,
        'binary_operator_spaces' => true,
        'strict_comparison' => true,
        'standardize_not_equals' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_unused_imports' => true,
        'no_useless_else' => true,
        'blank_line_before_statement' => true,
        'whitespace_after_comma_in_array' => true,
        '@PSR12' => true,
        'no_unused_imports' => true,
        '@Symfony' => true,
        'concat_space' => ['spacing' => 'one'],
        'single_line_throw' => false,
        '@Symfony:risky' => true,
    ])
    ->setFinder($finder);

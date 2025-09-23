<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use VisualCraft\PhpCsFixerConfig;

$finder = Finder::create()
    ->in(__DIR__ . '/src')
    ->append([
        __DIR__ . '/.php-cs-fixer.dist.php',
    ])
;

$config = PhpCsFixerConfig\Factory::fromRuleSet(new PhpCsFixerConfig\RuleSet\Php84());
$config
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
;

return $config;

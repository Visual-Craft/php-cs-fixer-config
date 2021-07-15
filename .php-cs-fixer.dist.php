<?php

$config = \VisualCraft\PhpCsFixerConfig\Factory::fromRuleSet(new \VisualCraft\PhpCsFixerConfig\RuleSet\Php74());

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->name('.php-cs-fixer.dist.php')
;

$config
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/.php_cs.cache')
;

return $config;

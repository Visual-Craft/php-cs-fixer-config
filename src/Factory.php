<?php

declare(strict_types=1);

namespace VisualCraft\PhpCsFixerConfig;

use PhpCsFixer\Config;

class Factory
{
    /**
     * @param array<string, array|bool> $overrideRules
     */
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = []): Config
    {
        $config = new Config($ruleSet->name());

        $config
            ->setRiskyAllowed(true)
        ;
        $config->setRules(array_merge(
            $ruleSet->rules(),
            $overrideRules
        ));
        $config->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers());
        $config->registerCustomFixers(new \PedroTroller\CS\Fixer\Fixers());

        return $config;
    }
}

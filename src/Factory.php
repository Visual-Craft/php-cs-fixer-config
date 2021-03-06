<?php

declare(strict_types=1);

namespace VisualCraft\PhpCsFixerConfig;

use PhpCsFixer\Config;

final class Factory
{
    /**
     * @psalm-param array<string, array|bool> $overrideRules
     */
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = []): Config
    {
        $config = new Config($ruleSet->name());

        $config
            ->setRiskyAllowed($ruleSet->getRiskyAllowed())
            ->setRules(array_merge(
                $ruleSet->rules(),
                $overrideRules
            ))
            ->registerCustomFixers($ruleSet->getCustomFixers())
        ;

        return $config;
    }
}

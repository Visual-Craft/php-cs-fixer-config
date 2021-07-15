<?php

declare(strict_types=1);

namespace VisualCraft\PhpCsFixerConfig;

interface RuleSetInterface
{
    /**
     * Returns the name of the rule set.
     */
    public function name(): string;

    /**
     * Returns an array of rules along with their configuration.
     *
     * @psalm-return array<string, array|bool>
     */
    public function rules(): array;
}

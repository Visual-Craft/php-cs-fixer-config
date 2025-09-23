<?php

declare(strict_types=1);

namespace VisualCraft\PhpCsFixerConfig;

use PhpCsFixer\Fixer\FixerInterface;

interface RuleSetInterface
{
    /**
     * Returns the name of the rule set.
     */
    public function name(): string;

    /**
     * Returns an array of rules along with their configuration.
     *
     * @psalm-return array<string, array<string, mixed>|bool>
     */
    public function rules(): array;

    /**
     * @return iterable<array-key, FixerInterface>
     */
    public function getCustomFixers(): iterable;

    public function getRiskyAllowed(): bool;
}

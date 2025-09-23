<?php

declare(strict_types=1);

namespace VisualCraft\PhpCsFixerConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer\CommentSurroundedBySpacesFixer;
use PhpCsFixerCustomFixers\Fixer\MultilineCommentOpeningClosingAloneFixer;
use PhpCsFixerCustomFixers\Fixer\NoDoctrineMigrationsGeneratedCommentFixer;
use PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer;
use PhpCsFixerCustomFixers\Fixer\NoImportFromGlobalNamespaceFixer;
use PhpCsFixerCustomFixers\Fixer\NoLeadingSlashInGlobalNamespaceFixer;
use PhpCsFixerCustomFixers\Fixer\NoNullableBooleanTypeFixer;
use PhpCsFixerCustomFixers\Fixer\NoPhpStormGeneratedCommentFixer;
use PhpCsFixerCustomFixers\Fixer\NoSuperfluousConcatenationFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessCommentFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessDirnameCallFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessDoctrineRepositoryCommentFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessStrlenFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocNoSuperfluousParamFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocTypesTrimFixer;
use PhpCsFixerCustomFixers\Fixer\PhpUnitAssertArgumentsOrderFixer;
use PhpCsFixerCustomFixers\Fixer\PhpUnitDedicatedAssertFixer;
use PhpCsFixerCustomFixers\Fixer\PhpUnitNoUselessReturnFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer;
use PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer;
use PhpCsFixerCustomFixers\Fixers;
use VisualCraft\PhpCsFixerConfig\RuleSetInterface;

final class Php80 implements RuleSetInterface
{
    #[\Override]
    public function name(): string
    {
        return 'Visual Craft (PHP 8.0)';
    }

    #[\Override]
    public function rules(): array
    {
        return [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            '@PHP80Migration' => true,
            '@PHP80Migration:risky' => true,
            '@PhpCsFixer' => true,
            '@PhpCsFixer:risky' => true,
            '@DoctrineAnnotation' => true,
            'doctrine_annotation_braces' => false,
            '@PHPUnit84Migration:risky' => true,
            'php_unit_test_class_requires_covers' => false,
            'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'class_attributes_separation' => ['elements' => ['method' => 'one', 'property' => 'one']],
            'concat_space' => ['spacing' => 'one'],
            'phpdoc_align' => false,
            'phpdoc_separation' => false,
            'phpdoc_to_comment' => false,
            'phpdoc_add_missing_param_annotation' => false,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
            ],
            'increment_style' => false,
            'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
            'fopen_flags' => false,
            'return_assignment' => false,
            'final_internal_class' => false,
            'blank_line_before_statement' => [
                'statements' => [
                    'break',
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'do',
                    'exit',
                    'for',
                    'foreach',
                    'goto',
                    'if',
                    'include',
                    'include_once',
                    'require',
                    'require_once',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                ],
            ],
            CommentSurroundedBySpacesFixer::name() => true,
            MultilineCommentOpeningClosingAloneFixer::name() => true,
            NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            NoDuplicatedImportsFixer::name() => true,
            NoImportFromGlobalNamespaceFixer::name() => true,
            NoLeadingSlashInGlobalNamespaceFixer::name() => true,
            NoNullableBooleanTypeFixer::name() => true,
            NoPhpStormGeneratedCommentFixer::name() => true,
            NoSuperfluousConcatenationFixer::name() => true,
            NoUselessCommentFixer::name() => true,
            NoUselessDirnameCallFixer::name() => true,
            NoUselessDoctrineRepositoryCommentFixer::name() => true,
            NoUselessParenthesisFixer::name() => true,
            NoUselessStrlenFixer::name() => true,
            PhpUnitAssertArgumentsOrderFixer::name() => true,
            PhpUnitDedicatedAssertFixer::name() => true,
            PhpUnitNoUselessReturnFixer::name() => true,
            PhpdocNoSuperfluousParamFixer::name() => true,
            PhpdocTypesTrimFixer::name() => true,
            SingleSpaceAfterStatementFixer::name() => true,
            SingleSpaceBeforeStatementFixer::name() => true,
            StringableInterfaceFixer::name() => true,
            'PedroTroller/ordered_with_getter_and_setter_first' => true,
            'PedroTroller/line_break_between_statements' => true,
            'method_chaining_indentation' => false,
        ];
    }

    #[\Override]
    public function getCustomFixers(): iterable
    {
        yield from new Fixers();
        yield from new \PedroTroller\CS\Fixer\Fixers();
    }

    #[\Override]
    public function getRiskyAllowed(): bool
    {
        return true;
    }
}

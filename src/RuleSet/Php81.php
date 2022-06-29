<?php

declare(strict_types=1);

namespace VisualCraft\PhpCsFixerConfig\RuleSet;

use VisualCraft\PhpCsFixerConfig\RuleSetInterface;

final class Php81 implements RuleSetInterface
{
    public function name(): string
    {
        return 'Visual Craft (PHP 8.1)';
    }

    public function rules(): array
    {
        return [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            '@PHP81Migration' => true,
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
            \PhpCsFixerCustomFixers\Fixer\CommentSurroundedBySpacesFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\DataProviderReturnTypeFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\DataProviderStaticFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoLeadingSlashInGlobalNamespaceFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoNullableBooleanTypeFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoPhpStormGeneratedCommentFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoSuperfluousConcatenationFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoUselessCommentFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoUselessDirnameCallFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoUselessDoctrineRepositoryCommentFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\NoUselessStrlenFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\PhpUnitAssertArgumentsOrderFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\PhpUnitDedicatedAssertFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\PhpUnitNoUselessReturnFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\PhpdocParamOrderFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\PhpdocTypesTrimFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer::name() => true,
            \PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer::name() => true,
            'PedroTroller/ordered_with_getter_and_setter_first' => true,
            'PedroTroller/line_break_between_method_arguments' => [
                'max-args' => false,
                'max-length' => 120,
                'automatic-argument-merge' => true,
            ],
            'PedroTroller/line_break_between_statements' => true,
        ];
    }

    public function getCustomFixers(): iterable
    {
        yield from new \PhpCsFixerCustomFixers\Fixers();
        yield from new \PedroTroller\CS\Fixer\Fixers();
    }

    public function getRiskyAllowed(): bool
    {
        return true;
    }
}

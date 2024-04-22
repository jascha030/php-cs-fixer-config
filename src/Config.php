<?php

/*
 * This file is part of the WP Brothers WordPress Back-end PHP-CS-Fixer Config package.
 *
 * (c) WP Brothers <wordpress@socialbrothers.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace SocialBrothers\PhpCsFixer;

use PhpCsFixer\Config as BaseConfig;

use const ARRAY_FILTER_USE_BOTH;

class Config extends BaseConfig
{
    public const PHP_74 = 70400;

    public const PHP_80 = 80000;

    public const PHP_81 = 80100;

    public const PHP_82 = 80200;

    public const PHP_83 = 80300;

    public const SUPPORTED_VERSIONS = [
        self::PHP_74,
        self::PHP_80,
        self::PHP_81,
        self::PHP_82,
        self::PHP_83,
    ];

    /**
     * The default ruleset.
     *
     * @var array<string,mixed>
     */
    private const BASE_RULES = [
        '@PHP70Migration'       => true,
        '@PHP70Migration:risky' => true,
        '@PHP73Migration'       => true,

        '@PHP74Migration'       => true,
        '@PHP74Migration:risky' => true,

        '@PER'       => true,
        '@PER:risky' => true,

        '@PSR1'        => true,
        '@PSR12'       => true,
        '@PSR12:risky' => true,

        '@Symfony'       => true,
        '@Symfony:risky' => true,

        'declare_strict_types'                             => true,
        'no_php4_constructor'                              => true,
        'single_line_empty_body'                           => false,
        'blank_line_after_opening_tag'                     => false, // due to WordPress templating.
        'nullable_type_declaration_for_default_null_value' => true,
        'class_definition'                                 => [
            'space_before_parenthesis' => true,
            'single_line'              => true,
        ],
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
        ],
        'ordered_imports' => [
            'imports_order' => [
                'class',
                'function',
                'const',
            ],
            'sort_algorithm' => 'alpha',
        ],
        'echo_tag_syntax' => [
            'format' => 'short',
        ],
        'single_class_element_per_statement' => [
            'elements' => ['property'],
        ],
        'not_operator_with_successor_space' => true,
        'single_quote'                      => [
            'strings_containing_single_quote_chars' => true,
        ],
        'class_attributes_separation' => [
            'elements' => [
                'const'        => 'one',
                'method'       => 'one',
                'property'     => 'one',
                'trait_import' => 'none',
            ],
        ],
        'combine_consecutive_unsets' => true,
        'combine_consecutive_issets' => true,
        'concat_space'               => [
            'spacing' => 'one',
        ],
        'no_trailing_comma_in_singleline_array' => true,
        'array_syntax'                          => [
            'syntax' => 'short',
        ],
        'align_multiline_comment' => true,
        'array_indentation'       => true,
        'binary_operator_spaces'  => [
            'default'   => 'single_space',
            'operators' => [
                '='  => 'align_single_space_minimal',
                '=>' => 'align_single_space_minimal',
            ],
        ],
        'blank_line_before_statement' => [
            'statements' => [
                'break',
                'case',
                'continue',
                'declare',
                'default',
                'exit',
                'goto',
                'include',
                'include_once',
                'require',
                'require_once',
                'return',
                'switch',
                'throw',
                'try',
            ],
        ],
        'doctrine_annotation_spaces'  => true,
        'escape_implicit_backslashes' => true,
        'explicit_indirect_variable'  => true,
        'explicit_string_variable'    => true,
        'global_namespace_import'     => [
            'import_classes'   => true,
            'import_constants' => true,
            'import_functions' => true,
        ],
        'heredoc_indentation'                    => true,
        'heredoc_to_nowdoc'                      => true,
        'method_chaining_indentation'            => true,
        'multiline_comment_opening_closing'      => true,
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        'no_alternative_syntax' => [
            'fix_non_monolithic_code' => false,
        ],
        'no_extra_blank_lines' => [
            'tokens' => [
                'break',
                'case',
                'continue',
                'curly_brace_block',
                'default',
                'extra',
                'parenthesis_brace_block',
                'return',
                'square_brace_block',
                'switch',
                'throw',
                'use',
                'attribute',
            ],
        ],
        'no_null_property_initialization' => true,
        'no_superfluous_elseif'           => true,
        'no_trailing_comma_in_list_call'  => true,
        'no_useless_else'                 => true,
        'no_useless_return'               => true,
        'operator_linebreak'              => [
            'only_booleans' => true,
        ],
        'php_unit_internal_class'             => true,
        'php_unit_test_class_requires_covers' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_no_empty_return'              => true,
        'phpdoc_order_by_value'               => true,
        'phpdoc_to_comment'                   => false,
        'phpdoc_var_annotation_correct_order' => true,
        'protected_to_private'                => true,
        'return_assignment'                   => true,
        'self_static_accessor'                => true,
        'no_trailing_comma_in_singleline'     => [
            'elements' => [
                'arguments',
                'array_destructuring',
                'array',
                'group_import',
            ],
        ],
        'trailing_comma_in_multiline' => [
            'after_heredoc' => true,
            'elements'      => [
                'arrays',
                'arguments',
            ],
        ],
    ];

    /**
     * The ruleset to be applied.
     *
     * @var array<string,mixed>
     */
    private const PHP_VERSION_SPECIFIC_RULES = [
        80000 => [
            '@PHP80Migration'       => true,
            '@PHP80Migration:risky' => true,
        ],
        80100 => [
            '@PHP81Migration'            => true,
            'no_superfluous_phpdoc_tags' => [
                'remove_inheritdoc' => true,
                'allow_mixed'       => false,
            ],
            'trailing_comma_in_multiline' => [
                'after_heredoc' => true,
                'elements'      => [
                    'arrays',
                    'arguments',
                    'parameters',
                    'match',
                ],
            ],
        ],
        80200 => ['@PHP82Migration' => true],
        80300 => ['@PHP83Migration' => true],
    ];

    public function __construct(int $phpMinVersion = 80200, ?string $headerComment = null)
    {
        parent::__construct();

        $phpSpecificRules = array_filter(
            self::PHP_VERSION_SPECIFIC_RULES,
            static fn (array $rules, int $requiredPhpVersion): bool => $requiredPhpVersion <= $phpMinVersion,
            ARRAY_FILTER_USE_BOTH,
        );

        $headerRule = null === $headerComment
            ? []
            : [
                'header_comment' => [
                    'header'   => $headerComment,
                    'location' => 'after_open',
                ],
            ];

        $rules = array_merge(
            self::BASE_RULES,
            $headerRule,
            ...$phpSpecificRules,
        );

        $this
            ->setRules($rules)
            ->setRiskyAllowed(true);
    }

    /**
     * @param array<string, mixed> $rules
     */
    public function addRules(array $rules): self
    {
        $this->setRules(
            array_merge(
                $this->getRules(),
                $rules,
            ),
        );

        return $this;
    }
}

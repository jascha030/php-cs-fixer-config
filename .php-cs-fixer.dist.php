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

use PhpCsFixer\Finder;
use SocialBrothers\PhpCsFixer\Config;

/**
 * Cache dir and file location.
 */
$cacheDirectory = __DIR__ . '/.var/cache';
$cacheFile      = "{$cacheDirectory}/.php-cs-fixer.cache";

/**
 * Create a .cache dir if not already present.
 */
if (! file_exists($cacheDirectory) && ! mkdir($cacheDirectory, 0700, true) && ! is_dir($cacheDirectory)) {
    throw new RuntimeException(sprintf('Directory "%s" was not created', $cacheDirectory));
}

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude([
        'tests/Fixtures',
        'vendor',
    ])
    ->ignoreDotFiles(false);

return (new Config(
    Config::PHP_74,
    <<<'EOF'
        This file is part of the WP Brothers WordPress Back-end PHP-CS-Fixer Config package.

        (c) WP Brothers <wordpress@socialbrothers.nl>

        For the full copyright and license information, please view the LICENSE
        file that was distributed with this source code.
        EOF,
))
    ->setFinder($finder)
    ->setCacheFile($cacheFile);

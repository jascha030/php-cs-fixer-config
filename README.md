# WordPress Back-end Php-cs-fixer Config

WP Back-end default configuration for php-cs-fixer.

## Installation

```bash
composer require --dev socialbrothers/wpbe-php-cs-fixer
```

## Usage

The `SocialBrothers/PhpCsFixer/Config` class extends `PhpCsFixer\Config` class and automatically sets our default
php-cs-fixer ruleset.
It allows you to set the language version and header comment in a more readable way.

This means any other method from the `PhpCsFixer\Config` class can be used as well.

### Language Version

The `SocialBrothers/PhpCsFixer/Enum/LanguageVersion` class contains constants for the available PHP language versions.

```php
    public const SUPPORTED_VERSIONS = [
        self::PHP_74, // 70400
        self::PHP_80, // 80000
        self::PHP_81, // 80100
        self::PHP_82, // 80200 (Currently the default value)
        self::PHP_83, // 80300
    ];
```

```php
<?php declare(strict_types=1);

use SocialBrothers\PhpCsFixer\Config;
use PhpCsFixer\Finder;
use SocialBrothers\PhpCsFixer\Enum\LanguageVersion;

// Use the default PHP-cs-fixer Finder as you would normally do.
$finder = Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor'])
    ->ignoreDotFiles(false);

$config = new Config(
    Config::PHP_74, // Set a minimal PHP Language version (8.2 is the default value).
    <<<'EOF'
        This file is part of the WP Brothers WordPress Back-end PHP-CS-Fixer Config package.

        (c) WP Brothers <=wordpress@socialbrothers.nl>

        For the full copyright and license information, please view the LICENSE
        file that was distributed with this source code.
    EOF, // Add optional header comment, if needed for the license. (In most cases we won't need this and the argument can be omitted).
);

$config->addRules([
    // Add or override custom or project-specific rules here if needed.
]);

return $config->setFinder($finder); // Set the finder to specify the files to be fixed.
```

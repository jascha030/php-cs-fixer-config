# WordPress Php-cs-fixer Config

WP Back-end default configurations for php-cs-fixer.

## Installation

```bash
composer require --dev jascha030/php-cs-fixer-config
```

## Usage

The `Jascha030\PhpCsFixer\Config` class extends `PhpCsFixer\Config` class
and automatically sets our default php-cs-fixer ruleset.
It allows you to set the language version and header comment in a more readable way.

This means any other method from the `PhpCsFixer\Config` class can be used as well.

### Language Version

The `Jascha030\PhpCsFixer\Config` class contains constants for the available
PHP language versions.

```php
    public const SUPPORTED_VERSIONS = [
        self::PHP_74, // 70400
        self::PHP_80, // 80000
        self::PHP_81, // 80100
        self::PHP_82, // 80200 (Currently the default value)
        self::PHP_83, // 80300
    ];
```

### Full Example

```php
<?php declare(strict_types=1);

use Jascha030\PhpCsFixer\Config;
use PhpCsFixer\Finder;
use Jascha030\PhpCsFixer\Enum\LanguageVersion;

// Use the default PHP-cs-fixer Finder as you would normally do.
$finder = Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor'])
    ->ignoreDotFiles(false);

$config = new Config(
    Config::PHP_82, // Set a minimal PHP Language version (8.2 is the default value).
    <<<'EOF'
     This file is part of the jascha030/php-cs-fixer-config package.

     (c) Jascha van Aalst <contact@jaschavanaalst.nl>

     For the full copyright and license information, please view the LICENSE
     file that was distributed with this source code.
    EOF, // Add optional header comment, if needed for the license. (In most cases we won't need this and the argument can be omitted).
);

$config->addRules([
    // Add or override custom or project-specific rules here if needed.
]);

return $config->setFinder($finder); // Set the finder to specify the files to be fixed.
```

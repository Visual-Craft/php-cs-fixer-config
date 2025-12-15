# php-cs-fixer-config
Provides a configuration factory and multiple rule sets for [`friendsofphp/php-cs-fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer).

## Installation

Run

```sh
$ composer require --dev visual-craft/php-cs-fixer-config
```

## Usage

### Configuration

Pick one of the rule sets:

* [`VisualCraft\PhpCsFixerConfig\RuleSet\Php74`](src/RuleSet/Php74.php)
* [`VisualCraft\PhpCsFixerConfig\RuleSet\Php80`](src/RuleSet/Php80.php)
* [`VisualCraft\PhpCsFixerConfig\RuleSet\Php81`](src/RuleSet/Php81.php)
* [`VisualCraft\PhpCsFixerConfig\RuleSet\Php82`](src/RuleSet/Php82.php)
* [`VisualCraft\PhpCsFixerConfig\RuleSet\Php83`](src/RuleSet/Php83.php)
* [`VisualCraft\PhpCsFixerConfig\RuleSet\Php84`](src/RuleSet/Php84.php)
* [`VisualCraft\PhpCsFixerConfig\RuleSet\Php85`](src/RuleSet/Php85.php)

Create a configuration file `.php-cs-fixer.dist.php` in the root of your project:

```php
<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use VisualCraft\PhpCsFixerConfig\Factory;
use VisualCraft\PhpCsFixerConfig\RuleSet\Php85;

$finder = Finder::create()
    ->in(__DIR__ . '/src')
    ->append([
        __DIR__ . '/.php-cs-fixer.dist.php',
    ])
;

$config = Factory::fromRuleSet(new Php85());
$config
    ->setUnsupportedPhpVersionAllowed(true)
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
;

return $config;


```

### Configuration with override rules

Optionally override rules from a rule set by passing in an array of rules to be merged in:

```diff
 <?php

 declare(strict_types=1);

use PhpCsFixer\Finder;
use VisualCraft\PhpCsFixerConfig\Factory;
use VisualCraft\PhpCsFixerConfig\RuleSet\Php85;

$finder = Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->in(__DIR__ . '/migrations')
    ->append([
        __DIR__ . '/.twig_cs.dist',
        __DIR__ . '/.php-cs-fixer.dist.php',
    ])
;

-$config = Factory::fromRuleSet(new Php85());
+$config = Factory::fromRuleSet(new Php85(), [
+    'strict_comparison' => false,
+]);
 $config
     ->setUnsupportedPhpVersionAllowed(true)
     ->setFinder($finder)
     ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
 ;

 return $config;

```

### Composer scripts

If you like [`composer` scripts](https://getcomposer.org/doc/articles/scripts.md), add a scripts to `composer.json`:

```diff
 {
   "name": "foo/bar",
   "require": {
     "php": "^8.5",
   },
   "require-dev": {
     "visual-craft/php-cs-fixer-config": "*"
+  },
+  "scripts": {
+    "cs-check": "vendor/bin/php-cs-fixer fix --dry-run --diff -v --ansi",
+    "cs-fix": "vendor/bin/php-cs-fixer fix --diff -v --ansi"
   }
 }
```

Run

```
$ composer cs-fix
```

to automatically fix coding standard violations.

Run

```
$ composer cs-check
```

to automatically show coding standard violations.

## Credits

Developed by [Visual Craft](https://www.visual-craft.com/), inspired by [ergebnis/php-cs-fixer-config](https://github.com/ergebnis/php-cs-fixer-config).

## License

This project is under the [MIT license](LICENSE).
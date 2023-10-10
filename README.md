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

Create a configuration file `.php-cs-fixer.dist.php` in the root of your project:

```php
<?php

declare(strict_types=1);

use VisualCraft\PhpCsFixerConfig;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->append([
        __DIR__ . '/.php-cs-fixer.dist.php',
    ])
;

$config = PhpCsFixerConfig\Factory::fromRuleSet(new PhpCsFixerConfig\RuleSet\Php82());
$config
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

 use VisualCraft\PhpCsFixerConfig;

 $finder = PhpCsFixer\Finder::create()
     ->in(__DIR__ . '/src')
     ->append([
         __DIR__ . '/.php-cs-fixer.dist.php',
     ])
 ;

-$config = PhpCsFixerConfig\Factory::fromRuleSet(new PhpCsFixerConfig\RuleSet\Php74());
+$config = PhpCsFixerConfig\Factory::fromRuleSet(new PhpCsFixerConfig\RuleSet\Php74(), [
+    'strict_comparison' => false,
+]);
 $config
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
     "php": "^7.4",
   },
   "require-dev": {
     "visual-craft/php-cs-fixer-config": "~1.0.0"
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
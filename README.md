# Easi'r Coding Standard

The Easi'r Coding Standard is a set of rules for PHP_CodeSniffer and 
applies to all Easi'r projects. It is based on Doctrine, PSR-1 and 
PSR-2, with some noticeable exceptions/differences/extensions.

## Installation

Using _Composer_:

```bash
composer require easir/coding-standard
```

Put `phpcs.dist.xml` and adjust to your project specific needs:
```xml
<?xml version="1.0"?>
<ruleset
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="https://raw.githubusercontent.com/squizlabs/PHP_CodeSniffer/master/phpcs.xsd"
>
    <arg name="basepath" value="."/>
    <arg name="extensions" value="php"/>
    <arg name="parallel" value="80"/>
    <arg name="cache" value=".phpcs-cache"/>
    <arg name="colors"/>

    <!-- Ignore warnings, show progress of the run and show sniff names -->
    <arg value="nps"/>

    <!-- Directories to be checked -->
    <file>src</file>

    <rule ref="Easir"/>
</ruleset>
```

Run `PHP_CodeSniffer` in your terminal (_replace with `vendor/bin` path if no `bin-dir` configured in your `composer.json`_):
* `bin/phpcs` to check coding standard
* `bin/phpcbf` to fix your project coding standard

## Configuration

For Laravel Projects add following directories to your `phpcs.dist.xml`:
```xml
<?xml version="1.0"?>
<ruleset>
    <file>app</file>
</ruleset>
```

## Summary

Rules imported from Doctrine Coding Standard:
* Keep the nesting of control structures per method as small as possible
* Abstract exception class names and exception interface names should be suffixed with Exception
* Abstract classes should not be prefixed with `Abstract`
* Interfaces should not be suffixed with `Interface`
* Concrete exception class names should not be suffixed with `Exception`
* Align equals (`=`) signs in assignments
* Add spaces around a concatenation operator `$foo = 'Hello ' . 'World!'`;
* Add spaces between assignment, control and return statements
* Add spaces after a type cast `$foo = (int) '12345';`
* Use apostrophes for enclosing strings
* Always use strict comparisons
* Always add native types where possible
* Omit phpDoc for parameters/returns with native types, unless adding description
* Don't use `@author`, `@since` and similar annotations that duplicate Git information
* Assignment in condition is not allowed
* Use parentheses when creating new instances that do not require arguments `$foo = new Foo()`
* Use Null Coalesce Operator `$foo = $bar ?? $baz`
* Prefer early exit over nesting conditions or using else

Changed rules:
* Don't add any spaces after a negation operator `if (!$cond)`
* Don't add any spaces before a colon in return type declaration `function (): void {}`
* Keep `declare()` statement in the same line with `<?php` open tag
* Always add `declare(strict_types = 1)` at the beginning of a file
* Keep absolute line length below 120 characters

For full reference of enforcements, go through `src/Easir/ruleset.xml`.


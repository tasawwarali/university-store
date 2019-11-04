# Coding Style Guide (CAPX)
We are going to use [PSR-2](https://www.php-fig.org/psr/psr-2/) coding style for this project as Laravel is also using this coding style. This guide extends and expands on PSR-1, the basic coding standard.

References:
- [PSR-2: Coding Style Guide - PHP-FIG](https://www.php-fig.org/psr/psr-2/)
- [PSR-1-basic-coding-standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md) 


## 1. General

### 1.1. PHP Tags
- PHP code MUST use the long `<?php ?>` tags or the short-echo `<?= ?>` tags; it MUST NOT use the other tag variations.

### 1.2. Side Effects
The phrase "side effects" means execution of logic not directly related to declaring classes, functions, constants, etc., merely from including the file.

"Side effects" include but are not limited to: generating output, explicit use of `require` or `include`, connecting to external services, modifying ini settings, emitting errors or exceptions, modifying global or static variables, reading from or writing to a file, and so on.

The following is an example of a file with both declarations and side effects; i.e, an example of **what to avoid**:

``` php
<?php
// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: loads a file
include "file.php";

// side effect: generates output
echo "<html>\n";

// declaration
function foo()
{
    // function body
}
```
The following example is of a file that contains declarations without side effects; i.e., an example of **what to emulate**:

``` php
<?php
// declaration
function foo()
{
    // function body
}

// conditional declaration is *not* a side effect
if (! function_exists('bar')) {
    function bar()
    {
        // function body
    }
}
```

### 1.3. Naming Convention (class, function, constants, variable)

- `Namespaces` and `classes` MUST follow an "autoloading" PSR: [[PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md), [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)] 
- `Class` names MUST be declared in `StudlyCaps` 


``` php
<?php
class UserSettings
{
    // Class body
}
```

- Class `constants` MUST be declared in all upper case with underscore separators. For example:

``` php
<?php
namespace Vendor\Model;

class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2012-06-01';
}
```

- `Variable` names can be either in `camelCase` or `snake_case`. Whatever naming convention is used SHOULD be applied consistently within a reasonable scope. That scope may be vendor-level, package-level, class-level, or method-level.


- `Method` names MUST be declared in `camelCase()`.

> In variable case we will go with `camelCase` as it seems it is using more in the code.

### 1.4. Files

- All PHP files MUST end with a single blank line.

- The closing `?>` tag MUST be omitted from files containing only PHP.

### 1.5. Lines
- There MUST NOT be a hard limit on line length. The soft limit on line length MUST be 120 characters.


- There MUST NOT be trailing whitespace at the end of non-blank lines.

- Blank lines MAY be added to improve readability and to indicate related blocks of code.

- There MUST NOT be more than one statement per line.

### 1.6. Indenting
- Code MUST use an indent of 4 spaces, and MUST NOT use tabs for indenting.

> Using only spaces, and not mixing spaces with tabs, helps to avoid problems with diffs, patches, history, and annotations. The use of spaces also makes it easy to insert fine-grained sub-indentation for inter-line alignment.


> Set your IDE/Editor indentation settings as *"Indent Using Spaces"* 

### 1.7. Keywords and True/False/Null
- PHP [keywords](http://php.net/manual/en/reserved.keywords.php) MUST be in lower case.

- The PHP constants `true`, `false`, and `null` etc MUST be in lower case.



## 2. Namespace and Use Declarations
- There MUST be one blank line after the `namespace` declaration.

- All `use` declarations MUST go after the namespace declaration.

- There MUST be one `use` keyword per declaration.

- There MUST be one blank line after the `use` block.

**For example:**

``` php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

// ... additional PHP code ...

```


## 3. Classes, Properties, and Methods

The term “class” refers to all classes, interfaces, and traits.

### 3.1. Extends and Implements

The `extends` and `implements` keywords MUST be declared on the same line as the class name. Lists of `implements` MAY be split across multiple lines.

The opening brace for the class MUST go on its own line; the closing brace for the class MUST go on the next line after the body.

**For example:**
``` php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}
```

### 3.2. Properties

- Visibility (`public`, `private` & `protected`) MUST be declared on all properties.


- There MUST NOT be more than one property declared per statement.

- Property names SHOULD NOT be prefixed with a single underscore to indicate protected or private visibility.

A property declaration looks like the following:
``` php
<?php
namespace Vendor\Package;

class ClassName
{
    public $foo = null;
}
```

### 3.3. Methods

 - Visibility (`public`, `private` & `protected`) MUST be declared on all methods.
- Method names MUST NOT be declared with a space after the method name. The opening brace MUST go on its own line, and the closing brace MUST go on the next line following the body. There MUST NOT be a space after the opening parenthesis, and there MUST NOT be a space before the closing parenthesis.

A method declaration looks like the following. Note the placement of parentheses, commas, spaces, and braces:

``` php
<?php
namespace Vendor\Package;

class ClassName
{
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

### 3.4. Method Arguments

- In the argument list, there MUST NOT be a space before each comma, and there MUST be one space after each comma.

- Method arguments with default values MUST go at the end of the argument list.

``` php 
<?php
namespace Vendor\Package;

class ClassName
{
    public function foo($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

- Argument lists MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.

- When the argument list is split across multiple lines, the closing parenthesis and opening brace MUST be placed together on their own line with one space between them.

``` php
<?php
namespace Vendor\Package;

class ClassName
{
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // method body
    }
}
```

### 3.5. abstract, final, and static

- When present, the `abstract` and `final` declarations MUST precede the visibility declaration.

- When present, the `static` declaration MUST come after the visibility declaration.

``` php
<?php
namespace Vendor\Package;

abstract class ClassName
{
    protected static $foo;

    abstract protected function zim();

    final public static function bar()
    {
        // method body
    }
}
```

### 3.6. Method and Function Calls
When making a method or function call, there MUST NOT be a space between the method or function name and the opening parenthesis, there MUST NOT be a space after the opening parenthesis, and there MUST NOT be a space before the closing parenthesis. In the argument list, there MUST NOT be a space before each comma, and there MUST be one space after each comma.
``` php
<?php
bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);

```
Argument lists MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.

``` php
<?php
$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```



## 4. Control Structures (if, else, switch, while, for)
 The general style rules for control structures are as follows:
- There MUST be one space after the control structure keyword
- There MUST NOT be a space after the opening parenthesis
- There MUST NOT be a space before the closing parenthesis
- There MUST be one space between the closing parenthesis and the opening brace
- The structure body MUST be indented once
- The closing brace MUST be on the next line after the body

The body of each structure MUST be enclosed by braces. This standardizes how the structures look, and reduces the likelihood of introducing errors as new lines get added to the body.

### 4.1. if, elseif, else
``` php
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}
```
> The keyword `elseif` SHOULD be used instead of `else if` so that all control keywords look like single words.

### 4.2. switch, case

The `case` statement MUST be indented once from `switch`, and the `break` keyword (or other terminating keyword) MUST be indented at the same level as the `case` body. There MUST be a comment such as `// no break` when fall-through is intentional in a non-empty `case` body.

``` php
<?php
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}
```

### 4.3. while, do while

``` php
<?php
while ($expr) {
    // structure body
}
```
Similarly, a `do while` statement looks like the following.

``` php
<?php
do {
    // structure body;
} while ($expr);
```

### 4.4. for, foreach
 A `for` statement looks like the following.
``` php
<?php
for ($i = 0; $i < 10; $i++) {
    // for body
} 
```
A `foreach` statement looks like the following.

``` php
<?php
foreach ($iterable as $key => $value) {
    // foreach body
} 
```

### 4.5. try, catch

``` php 
<?php
try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}
```

## 5. Closures

- Closures MUST be declared with a space after the function keyword, and a space before and after the use keyword.

- The opening brace MUST go on the same line, and the closing brace MUST go on the next line following the body.

- There MUST NOT be a space after the opening parenthesis of the argument list or variable list, and there MUST NOT be a space before the closing parenthesis of the argument list or variable list.

- In the argument list and variable list, there MUST NOT be a space before each comma, and there MUST be one space after each comma.

- Closure arguments with default values MUST go at the end of the argument list.

``` php
<?php
$closureWithArgs = function ($arg1, $arg2) {
    // body
};

$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // body
}; 
```
Argument lists and variable lists MAY be split across multiple lines

``` php 
<?php
$longArgs_noVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) {
    // body
};

$noArgs_longVars = function () use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};

$longArgs_longVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};

$longArgs_shortVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use ($var1) {
    // body
};

$shortArgs_longVars = function ($arg) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};
```

## Note:
There are many elements of style and practice intentionally omitted by this guide. These include but are not limited to:

- Declaration of global variables and global constants

- Declaration of functions

- Operators and assignment

- Inter-line alignment

- Comments and documentation blocks

- Class name prefixes and suffixes

- Best practices


-------------------------PSR-2 Section Completed-----------------------

---
# Documenting Code (Comments)

Referances:
- [PHP manual - comments](https://www.php.net/manual/en/language.basic-syntax.comments.php#54296) 
- [stackoverflow](https://stackoverflow.com/questions/9067094/php-commenting-standards)
- [phpDocumentor](https://www.phpdoc.org/)

Comments are very important to understand the code written by you. It saves the time of your team-member in understanding and using your code.

We are going to use a **JavaDoc-like comment syntax**.

> You can use a plugin for generating these comments on your code block. Like I use `DocBlockr` package in sublime.

## Syntax

The basic syntax for this type of comments is, it starts with `/**` and end with `*/` The description about the code block is written with each line starts with `*`.
 > Each `*` in description lines has a space both in front and back.

e.g `<space>*<space> line...`

### For Class

The writer of the class/library can place his/her name so that team members can know who write it. 
``` php 

/**
 * [description]
 * 
 * @author [name] <[<email address>]>
 */
class ClassName
{
   // class body
}


/**
 * Event is the base class for classes containing event data.
 * 
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class Event
{
   // class body
}

```

### For Functions
In functions you can define the description, name and type etc of parameters and return data. Also tell about what kind of Exceptions your function can throw.

``` php 

/**
 * [function description]
 * 
 * @param  [type] $arg1 [<description>]
 * @param  [type] $arg1 [<description>]
 *
 * @return [type] [<description>]
 * @throws [type] [<description>]
 * @author [name] <[<email address>]>
 */
public function funcName($arg1, $arg2)
{
   // function body
}

```

### For Class Properties/Members

Note the example.
``` php 
/**
 * [description]
 * @var [type]
 */
protected $foo;


/**
 * @var bool Whether no further event listeners should be triggered
 */
private $propagationStopped = false;

```

> A very interesting thing about writing comments in this format is that you can get the documentation directly from them by using [PHPDocumentor](https://www.phpdoc.org/) tool.

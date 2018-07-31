# Page Templates

Unregister page templates through configuration.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-page-templates`.

## Usage

Within your config file (typically found at `config/defaults.php`) define an array of page templates you would like to unregister.

There are already class constants defined for the Genesis archive and blog templates.

For example:

```php
use D2\Core\PageTemplate;

$d2_page_templates = [
    PageTemplate::UNREGISTER => [
        PageTemplate::ARCHIVE,
        PageTemplate::BLOG,
    ],
];

return [
    PageTemplate::class => $d2_page_templates,
];
 ```

## Load the component

Components should be loaded in your theme `functions.php` file, using the `Theme::setup` static method. Code should run on the `after_setup_theme` hook (or `genesis_setup` if you use Genesis Framework).

```php
add_action( 'after_setup_theme', function() {
    $config = include_once __DIR__ . '/config/defaults.php';
    D2\Core\Theme::setup( $config );
} );
```

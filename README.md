# Rapyd Modular Management for Laravel

This package provides a streamlined approach to managing modular components within a Laravel application, particularly when used in conjunction with the [Rapyd Admin](https://github.com/zofe/rapyd-admin) package. 

With this tool, you can easily install standalone modules—whether public or private—directly into your Laravel project's `Modules/` directory, rather than the `vendor/` directory. This approach ensures that each module is seamlessly integrated into your project, enhancing maintainability and modularity.

## Key Features

- **Modular Installation**: Install modules into the `Modules/` directory to keep them as part of your project's structure.
- **Simplified Process**: Use composer to add modules effortlessly. For instance, running `composer install myvendor@mymodule-module` will place the module in your `Modules/` directory.

## Important Notes

- The "update" and "remove" logic for modules installed via composer using this installer is deliberately not implemented.
- Running `composer remove myvendor@mymodule-module` will not delete the module's folder or any of your changes from the project.

This package is designed to facilitate the modular management of your Laravel application, ensuring that each module remains a coherent part of your development environment.


## Creating Your Own Module

To create your own module for a Laravel application using Rapyd Admin, you can define a custom composer package. Below is an example of a `composer.json` file for a generic module:

```json
{
    "name": "yourvendor/yourmodule",
    "description": "A custom module for a Laravel application",
    "license": "mit",
    "type": "rapyd-module",
    "authors": [
        {
            "name": "Your Name",
            "email": "your.email@example.com"
        }
    ],
    "require": {
        "php": "^8.2",
        "illuminate/config": "^11.0",
        "illuminate/contracts": "^11.0"
    },
    "config": {
        "allow-plugins": {
            "zofe/rapyd-module-installer": true
        }
    },
    "extra": {
        "laravel": {
            "providers": [
                "App\\Modules\\YourModule\\YourModuleServiceProvider"
            ]
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
```

Basic folder structure for the module:

```
Livewire/
  ├─ Component.php
Views/
  ├─ component_view.blade.php
├─ routes.php
├─ config.php
├─ composer.json

```



## Notes
* 

## Public available modules

[zofe/demo-module](https://github.com/zofe/demo-module) rapyd demo 

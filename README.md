# Rapyd Module Installer

The purpose of this package is to allow for easy installation of standalone Modules (public or private) into a Laravel application that is powered by [Rapyd Livewire](https://github.com/zofe/rapyd-livewire) package.
This package will ensure that your module is installed into the `Modules/` directory instead of `vendor/` to make each module you need automatically part of your project

The "update" and "remove" logic of modules installed via composer by this installer is deliberately not implemented.
For example "composer install myvendor@mymodule-module" will download the module and install it in your Module directory.

But "composer remove myvendor@mymodule-module" will not delete the module folder and your changes from your project


## Installation

1. Ensure you have the `type` set to `rapyd-module` in your module's `composer.json`
2. Ensure your package is named in the convention `<namespace>/<name>-module`, for example `zofe/demo-module` would install into `app/Modules/Demo`
3. Require this package: `composer require zofe/rapyd-module-installer`
4. Require your bespoke module using Composer. You may want to set the constraint to `dev-master` to ensure you always get the latest version.

## Notes
* 

## Public available modules

[zofe/demo-module](https://github.com/zofe/demo-module) rapyd demo 

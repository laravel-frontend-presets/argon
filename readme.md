# Argon Frontend Preset For Laravel Framework 9.x and Up

![version](https://img.shields.io/badge/version-1.0.12-blue.svg) ![license](https://img.shields.io/badge/license-MIT-blue.svg) [![GitHub issues open](https://img.shields.io/github/issues/laravel-frontend-presets/argon.svg?maxAge=2592000)](https://github.com/laravel-frontend-presets/argon/issues?q=is%3Aopen+is%3Aissue) [![GitHub issues closed](https://img.shields.io/github/issues-closed-raw/laravel-frontend-presets/argon.svg?maxAge=2592000)](https://github.com/laravel-frontend-presets/argon/issues?q=is%3Aissue+is%3Aclosed)

*Current version*: Argon v1.1.2. More info at https://www.creative-tim.com/product/argon-dashboard-laravel.

[<img src="https://s3.amazonaws.com/creativetim_bucket/products/140/original/opt_ad_laravel_thumbnail.jpg" width="100%" />](https://www.creative-tim.com/live/argon-dashboard-laravel) 

## Note

We recommend installing this preset on a project that you are starting from scratch, otherwise your project's design might break.

## Prerequisites

If you don't already have an Apache local environment with PHP and MySQL, use one of the following links:

 - Windows: https://updivision.com/blog/post/beginner-s-guide-to-setting-up-your-local-development-environment-on-windows
 - Linux: https://howtoubuntu.org/how-to-install-lamp-on-ubuntu
 - Mac: https://wpshout.com/quick-guides/how-to-install-mamp-on-your-mac/

Also, you will need to install Composer: https://getcomposer.org/doc/00-intro.md   
And Laravel: https://laravel.com/docs/9.x/installation

## Installation

After initializing a fresh instance of Laravel (and making all the necessary configurations), install the preset using one of the provided methods:

### Via composer

1. `Cd` to your Laravel app  
2. Type in your terminal: `composer require laravel/ui` and `php artisan ui vue --auth`
3. Install this preset via `composer require laravel-frontend-presets/argon`. No need to register the service provider. Laravel 9.x & up can auto detect the package.
4. Run `php artisan ui argon` command to install the Argon preset. This will install all the necessary assets and also the custom auth views, it will also add the auth route in `routes/web.php`
(NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in routes/web.php)
5. In your terminal run `composer dump-autoload`
6. Run `php artisan migrate --seed` to create basic users table

### By using the archive

1. In your application's root create a **presets** folder
2. [Download an archive](https://github.com/laravel-frontend-presets/argon/archive/master.zip) of the repo and unzip it
3. Copy and paste **argon-master** folder in presets (created in step 2) and rename it to **argon**
4. Open `composer.json` file 
5. Add `"LaravelFrontendPresets\\ArgonPreset\\": "presets/argon/src"` to `autoload/psr-4` and to `autoload-dev/psr-4`
6. Add `LaravelFrontendPresets\ArgonPreset\ArgonPresetServiceProvider::class` to `config/app.php` file
7. Type in your terminal: `composer require laravel/ui` and `php artisan ui vue --auth`
8. In your terminal run `composer dump-autoload`
9. Run `php artisan ui argon` command to install the Argon preset. This will install all the necessary assets and also the custom auth views, it will also add the auth route in `routes/web.php`
(NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in routes/web.php)
10. Run `php artisan migrate --seed` to create basic users table


## Usage

Register a user or login using **admin@argon.com** and **secret** and start testing the preset (make sure to run the migrations and seeders for these credentials to be available).

Besides the dashboard and the auth pages this preset also has an edit profile page. All the necessary files (controllers, requests, views) are installed out of the box and all the needed routes are added to `routes/web.php`. Keep in mind that all of the features can be viewed once you login using the credentials provided above or by registering your own user. 

### Dashboard

You can access the dashboard either by using the "**Dashboard**" link in the left sidebar or by adding **/home** in the url. 

### Profile edit

You have the option to edit the current logged in user's profile (change name, email and password). To access this page just click the "**User profile**" link in the left sidebar or by adding **/profile** in the url.

The `App\Http\Controllers\ProfileController` handles the update of the user information. 

```
public function update(ProfileRequest $request)
{
    auth()->user()->update($request->all());

    return back()->withStatus(__('Profile successfully updated.'));
}
```

Also you shouldn't worry about entering wrong data in the inputs when editing the profile, validation rules were added to prevent this (see `App\Http\Requests\ProfileRequest`). If you try to change the password you will see that other validation rules were added in `App\Http\Requests\PasswordRequest`. Notice that in this file you have a custom validation rule that can be found in `App\Rules\CurrentPasswordCheckRule`.

```
public function rules()
{
    return [
        'old_password' => ['required', 'min:6', new CurrentPasswordCheckRule],
        'password' => ['required', 'min:6', 'confirmed', 'different:old_password'],
        'password_confirmation' => ['required', 'min:6'],
    ];
}
```

## Table of Contents

* [Demo](#demo)
* [Documentation](#documentation)
* [File Structure](#file-structure)
* [Browser Support](#browser-support)
* [Reporting Issues](#reporting-issues)
* [Social Media](#social-media)

## Demo

| Login | Users Page |
| --- | ---  |
| [![Login](/screens/Login.png)](https://www.creative-tim.com/live/argon-dashboard-laravel)  | [![Users Page](/screens/Users.png)](https://www.creative-tim.com/live/argon-dashboard-laravel)

| Profile Page | Dashboard |
| --- | --- |
| [![Profile Page](/screens/Profile.png)](https://www.creative-tim.com/live/argon-dashboard-laravel)   | [![Dashboard](/screens/Dashboard.png)](https://www.creative-tim.com/live/argon-dashboard-laravel)
[View More](https://www.creative-tim.com/live/argon-dashboard-laravel)

## Documentation
The documentation for the Material Dashboard Laravel is hosted at our [website](https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html).

## File Structure
```

├── app
│   ├── Category.php
│   ├── Console
│   │   └── Kernel.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── Auth
│   │   │   │   ├── ForgotPasswordController.php
│   │   │   │   ├── LoginController.php
│   │   │   │   ├── RegisterController.php
│   │   │   │   ├── ResetPasswordController.php
│   │   │   │   └── VerificationController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── Controller.php
│   │   │   ├── HomeController.php
│   │   │   ├── PageController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── RoleController.php
│   │   │   └── UserController.php
│   │   ├── Kernel.php
│   │   ├── Middleware
│   │   │   ├── Authenticate.php
│   │   │   ├── CheckForMaintenanceMode.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrimStrings.php
│   │   │   ├── TrustProxies.php
│   │   │   └── VerifyCsrfToken.php
│   │   └── Requests
│   │       ├── CategoryRequest.php
│   │       ├── PasswordRequest.php
│   │       ├── ProfileRequest.php
│   │       ├── RoleRequest.php
│   │       └── UserRequest.php
│   ├── Observers
│   │   └── UserObserver.php
│   ├── Policies
│   │   ├── CategoryPolicy.php
│   │   ├── RolePolicy.php
│   │   └── UserPolicy.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   ├── Role.php
│   ├── Rules
│   │   └── CurrentPasswordCheckRule.php
│   ├── Tag.php
│   └── User.php
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
│       ├── packages.php
│       └── services.php
├── CHANGELOG.md
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── items.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   ├── session.php
│   └── view.php
├── database
│   ├── factories
│   │   └── UserFactory.php
│   ├── migrations
│   │   ├── 2014_10_12_100000_create_password_resets_table.php
│   │   ├── 2019_01_15_100000_create_roles_table.php
│   │   ├── 2019_01_15_110000_create_users_table.php
│   │   ├── 2019_01_17_121504_create_categories_table.php
│   │   ├── 2019_03_06_132557_add_photo_column_to_users_table.php
│   └── seeds
│       ├── CategoriesTableSeeder.php
│       ├── DatabaseSeeder.php
│       ├── ItemsTableSeeder.php
│       ├── RolesTableSeeder.php
│       ├── TagsTableSeeder.php
│       └── UsersTableSeeder.php
├── newrelic.ini
├── package.json
├── phpunit.xml
├── Procfile
├── public
│   ├── argon
│   │   ├── css
│   │   │   ├── argon.css
│   │   │   └── argon.min.css
│   │   ├── fonts
│   │   │   └── nucleo
│   │   │       ├── nucleo-icons.eot
│   │   │       ├── nucleo-icons.svg
│   │   │       ├── nucleo-icons.ttf
│   │   │       ├── nucleo-icons.woff
│   │   │       └── nucleo-icons.woff2
│   │   ├── img
│   │   │   ├── brand
│   │   │   │   ├── blue.png
│   │   │   │   ├── favicon.png
│   │   │   │   └── white.png
│   │   │   ├── icons
│   │   │   │   ├── cards
│   │   │   │   │   ├── bitcoin.png
│   │   │   │   │   ├── mastercard.png
│   │   │   │   │   ├── paypal.png
│   │   │   │   │   └── visa.png
│   │   │   │   ├── common
│   │   │   │   │   ├── github.svg
│   │   │   │   │   └── google.svg
│   │   │   │   └── flags
│   │   │   │       ├── DE.png
│   │   │   │       ├── GB.png
│   │   │   │       └── US.png
│   │   │   └── theme
│   │   │       ├── angular.jpg
│   │   │       ├── bootstrap.jpg
│   │   │       ├── img-1-1000x600.jpg
│   │   │       ├── img-1-1000x900.jpg
│   │   │       ├── landing-1.png
│   │   │       ├── landing-2.png
│   │   │       ├── landing-3.png
│   │   │       ├── profile-cover.jpg
│   │   │       ├── react.jpg
│   │   │       ├── sketch.jpg
│   │   │       ├── team-1-800x800.jpg
│   │   │       ├── team-1.jpg
│   │   │       ├── team-2-800x800.jpg
│   │   │       ├── team-2.jpg
│   │   │       ├── team-3-800x800.jpg
│   │   │       ├── team-3.jpg
│   │   │       ├── team-4-800x800.jpg
│   │   │       ├── team-4.jpg
│   │   │       ├── team-5.jpg
│   │   │       └── vue.jpg
│   │   ├── js
│   │   │   ├── argon.js
│   │   │   ├── argon.min.js
│   │   │   ├── components
│   │   │   │   ├── charts
│   │   │   │   │   ├── chart-bars.js
│   │   │   │   │   ├── chart-bars.min.js
│   │   │   │   │   ├── chart-bar-stacked.js
│   │   │   │   │   ├── chart-bar-stacked.min.js
│   │   │   │   │   ├── chart-doughnut.js
│   │   │   │   │   ├── chart-doughnut.min.js
│   │   │   │   │   ├── chart-line.js
│   │   │   │   │   ├── chart-line.min.js
│   │   │   │   │   ├── chart-pie.js
│   │   │   │   │   ├── chart-pie.min.js
│   │   │   │   │   ├── chart-points.js
│   │   │   │   │   ├── chart-points.min.js
│   │   │   │   │   ├── chart-sales-dark.js
│   │   │   │   │   ├── chart-sales-dark.min.js
│   │   │   │   │   ├── chart-sales.js
│   │   │   │   │   └── chart-sales.min.js
│   │   │   │   ├── custom
│   │   │   │   │   ├── checklist.js
│   │   │   │   │   ├── checklist.min.js
│   │   │   │   │   ├── form-control.js
│   │   │   │   │   └── form-control.min.js
│   │   │   │   ├── init
│   │   │   │   │   ├── chart-init.js
│   │   │   │   │   ├── chart-init.min.js
│   │   │   │   │   ├── copy-icon.js
│   │   │   │   │   ├── copy-icon.min.js
│   │   │   │   │   ├── navbar.js
│   │   │   │   │   ├── navbar.min.js
│   │   │   │   │   ├── popover.js
│   │   │   │   │   ├── popover.min.js
│   │   │   │   │   ├── scroll-to.js
│   │   │   │   │   ├── scroll-to.min.js
│   │   │   │   │   ├── tooltip.js
│   │   │   │   │   └── tooltip.min.js
│   │   │   │   ├── layout.js
│   │   │   │   ├── layout.min.js
│   │   │   │   ├── license.js
│   │   │   │   ├── license.min.js
│   │   │   │   ├── maps
│   │   │   │   │   ├── maps-custom.js
│   │   │   │   │   ├── maps-custom.min.js
│   │   │   │   │   ├── maps-default.js
│   │   │   │   │   └── maps-default.min.js
│   │   │   │   └── vendor
│   │   │   │       ├── bootstrap-datepicker.js
│   │   │   │       ├── bootstrap-datepicker.min.js
│   │   │   │       ├── calendar.js
│   │   │   │       ├── calendar.min.js
│   │   │   │       ├── datatable.js
│   │   │   │       ├── datatable.min.js
│   │   │   │       ├── dropzone.js
│   │   │   │       ├── dropzone.min.js
│   │   │   │       ├── fullcalendar.js
│   │   │   │       ├── fullcalendar.min.js
│   │   │   │       ├── jvectormap.js
│   │   │   │       ├── jvectormap.min.js
│   │   │   │       ├── lavalamp.js
│   │   │   │       ├── lavalamp.min.js
│   │   │   │       ├── list.js
│   │   │   │       ├── list.min.js
│   │   │   │       ├── notify.js
│   │   │   │       ├── notify.min.js
│   │   │   │       ├── nouislider.js
│   │   │   │       ├── nouislider.min.js
│   │   │   │       ├── onscreen.js
│   │   │   │       ├── onscreen.min.js
│   │   │   │       ├── quill.js
│   │   │   │       ├── quill.min.js
│   │   │   │       ├── scrollbar.js
│   │   │   │       ├── scrollbar.min.js
│   │   │   │       ├── select2.js
│   │   │   │       ├── select2.min.js
│   │   │   │       ├── tags.js
│   │   │   │       └── tags.min.js
│   │   │   ├── demo.js
│   │   │   ├── demo.min.js
│   │   │   ├── items.js
│   │   │   └── vendor
│   │           └── jvectormap
│   │               ├── jquery-jvectormap-world-mill.js
│   │               ├── jquery-jvectormap-world-mill.min.js
│   │               └── README.md
│   ├── css
│   │   └── app.css
│   ├── docs
│   │   ├── assets
│   │   │   ├── css
│   │   │   │   └── argon.min.css
│   │   │   ├── fonts
│   │   │   │   └── nucleo
│   │   │   │       ├── nucleo-icons.eot
│   │   │   │       ├── nucleo-icons.svg
│   │   │   │       ├── nucleo-icons.ttf
│   │   │   │       ├── nucleo-icons.woff
│   │   │   │       └── nucleo-icons.woff2
│   │   │   ├── img
│   │   │   │   ├── brand
│   │   │   │   │   ├── blue.png
│   │   │   │   │   ├── favicon.png
│   │   │   │   │   └── white.png
│   │   │   │   ├── docs
│   │   │   │   │   └── getting-started
│   │   │   │   │       └── overview.svg
│   │   │   │   ├── icons
│   │   │   │   │   ├── cards
│   │   │   │   │   │   ├── bitcoin.png
│   │   │   │   │   │   ├── mastercard.png
│   │   │   │   │   │   ├── paypal.png
│   │   │   │   │   │   └── visa.png
│   │   │   │   │   ├── common
│   │   │   │   │   │   ├── github.svg
│   │   │   │   │   │   └── google.svg
│   │   │   │   │   └── flags
│   │   │   │   │       ├── DE.png
│   │   │   │   │       ├── FR.png
│   │   │   │   │       ├── GB.png
│   │   │   │   │       └── US.png
│   │   │   │   └── theme
│   │   │   │       ├── angular.jpg
│   │   │   │       ├── bootstrap.jpg
│   │   │   │       ├── img-1-1000x600.jpg
│   │   │   │       ├── img-1-1000x900.jpg
│   │   │   │       ├── img-1-1200x1000.jpg
│   │   │   │       ├── img-2-1200x1000.jpg
│   │   │   │       ├── landing-1.png
│   │   │   │       ├── landing-2.png
│   │   │   │       ├── landing-3.png
│   │   │   │       ├── profile-cover.jpg
│   │   │   │       ├── react.jpg
│   │   │   │       ├── sketch.jpg
│   │   │   │       ├── team-1.jpg
│   │   │   │       ├── team-2.jpg
│   │   │   │       ├── team-3.jpg
│   │   │   │       ├── team-4.jpg
│   │   │   │       ├── team-5.jpg
│   │   │   │       └── vue.jpg
│   │   │   ├── js
│   │   │   │   ├── argon.min.js
│   │   │   │   ├── demo.min.js
│   │   │   │   └── vendor
│   │   │   │       └── jvectormap
│   │   │   │           ├── jquery-jvectormap-world-mill.js
│   │   │   │           ├── jquery-jvectormap-world-mill.min.js
│   │   │   │           └── README.md
│   │   ├── components
│   │   │   ├── alerts.html
│   │   │   ├── avatar.html
│   │   │   ├── badge.html
│   │   │   ├── breadcrumb.html
│   │   │   ├── buttons.html
│   │   │   ├── card.html
│   │   │   ├── carousel.html
│   │   │   ├── collapse.html
│   │   │   ├── dropdowns.html
│   │   │   ├── forms.html
│   │   │   ├── input-group.html
│   │   │   ├── list-group.html
│   │   │   ├── modal.html
│   │   │   ├── navbar.html
│   │   │   ├── navs.html
│   │   │   ├── pagination.html
│   │   │   ├── popovers.html
│   │   │   ├── progress.html
│   │   │   ├── social-buttons.html
│   │   │   ├── tables.html
│   │   │   └── tooltips.html
│   │   ├── foundation
│   │   │   ├── colors.html
│   │   │   ├── grid.html
│   │   │   ├── icons.html
│   │   │   └── typography.html
│   │   ├── getting-started
│   │   │   ├── contents.html
│   │   │   ├── download.html
│   │   │   ├── installation.html
│   │   │   ├── license.html
│   │   │   └── overview.html
│   │   ├── laravel
│   │   │   ├── category-management.html
│   │   │   ├── item-management.html
│   │   │   ├── profile-edit.html
│   │   │   ├── role-management.html
│   │   │   ├── tag-management.html
│   │   │   └── user-management.html
│   │   └── plugins
│   │       ├── charts.html
│   │       ├── datatables.html
│   │       ├── datepicker.html
│   │       ├── dropdown.html
│   │       ├── dropzone.html
│   │       ├── fullcalendar.html
│   │       ├── headroom.html
│   │       ├── jvectormap.html
│   │       ├── list-js.html
│   │       ├── maps.html
│   │       ├── notify.html
│   │       ├── quill.html
│   │       ├── sliders.html
│   │       ├── sweet-alerts.html
│   │       └── tags.html
│   ├── favicon.ico
│   ├── index.php
│   ├── js
│   │   └── app.js
│   ├── pictures
│   │   ├── img1.jpg
│   │   ├── img2.jpg
│   │   └── img3.jpg
│   ├── robots.txt
│   └── svg
│       ├── 403.svg
│       ├── 404.svg
│       ├── 500.svg
│       └── 503.svg
├── README.md
├── resources
│   ├── assets
│   │   └── scss
│   │       ├── argon.scss
│   │       ├── bootstrap
│   │       │   ├── _alert.scss
│   │       │   ├── _badge.scss
│   │       │   ├── bootstrap-grid.scss
│   │       │   ├── bootstrap-reboot.scss
│   │       │   ├── bootstrap.scss
│   │       │   ├── _breadcrumb.scss
│   │       │   ├── _button-group.scss
│   │       │   ├── _buttons.scss
│   │       │   ├── _card.scss
│   │       │   ├── _carousel.scss
│   │       │   ├── _close.scss
│   │       │   ├── _code.scss
│   │       │   ├── _custom-forms.scss
│   │       │   ├── _dropdown.scss
│   │       │   ├── _forms.scss
│   │       │   ├── _functions.scss
│   │       │   ├── _grid.scss
│   │       │   ├── _images.scss
│   │       │   ├── _input-group.scss
│   │       │   ├── _jumbotron.scss
│   │       │   ├── _list-group.scss
│   │       │   ├── _media.scss
│   │       │   ├── mixins
│   │       │   │   ├── _alert.scss
│   │       │   │   ├── _background-variant.scss
│   │       │   │   ├── _badge.scss
│   │       │   │   ├── _border-radius.scss
│   │       │   │   ├── _box-shadow.scss
│   │       │   │   ├── _breakpoints.scss
│   │       │   │   ├── _buttons.scss
│   │       │   │   ├── _caret.scss
│   │       │   │   ├── _clearfix.scss
│   │       │   │   ├── _float.scss
│   │       │   │   ├── _forms.scss
│   │       │   │   ├── _gradients.scss
│   │       │   │   ├── _grid-framework.scss
│   │       │   │   ├── _grid.scss
│   │       │   │   ├── _hover.scss
│   │       │   │   ├── _image.scss
│   │       │   │   ├── _list-group.scss
│   │       │   │   ├── _lists.scss
│   │       │   │   ├── _nav-divider.scss
│   │       │   │   ├── _pagination.scss
│   │       │   │   ├── _reset-text.scss
│   │       │   │   ├── _resize.scss
│   │       │   │   ├── _screen-reader.scss
│   │       │   │   ├── _size.scss
│   │       │   │   ├── _table-row.scss
│   │       │   │   ├── _text-emphasis.scss
│   │       │   │   ├── _text-hide.scss
│   │       │   │   ├── _text-truncate.scss
│   │       │   │   ├── _transition.scss
│   │       │   │   └── _visibility.scss
│   │       │   ├── _mixins.scss
│   │       │   ├── _modal.scss
│   │       │   ├── _navbar.scss
│   │       │   ├── _nav.scss
│   │       │   ├── _pagination.scss
│   │       │   ├── _popover.scss
│   │       │   ├── _print.scss
│   │       │   ├── _progress.scss
│   │       │   ├── _reboot.scss
│   │       │   ├── _root.scss
│   │       │   ├── _tables.scss
│   │       │   ├── _tooltip.scss
│   │       │   ├── _transitions.scss
│   │       │   ├── _type.scss
│   │       │   ├── utilities
│   │       │   │   ├── _align.scss
│   │       │   │   ├── _background.scss
│   │       │   │   ├── _borders.scss
│   │       │   │   ├── _clearfix.scss
│   │       │   │   ├── _display.scss
│   │       │   │   ├── _embed.scss
│   │       │   │   ├── _flex.scss
│   │       │   │   ├── _float.scss
│   │       │   │   ├── _position.scss
│   │       │   │   ├── _screenreaders.scss
│   │       │   │   ├── _shadows.scss
│   │       │   │   ├── _sizing.scss
│   │       │   │   ├── _spacing.scss
│   │       │   │   ├── _text.scss
│   │       │   │   └── _visibility.scss
│   │       │   ├── _utilities.scss
│   │       │   └── _variables.scss
│   │       ├── core
│   │       │   ├── alerts
│   │       │   │   ├── _alert-dismissible.scss
│   │       │   │   ├── _alert-notify.scss
│   │       │   │   └── _alert.scss
│   │       │   ├── avatars
│   │       │   │   ├── _avatar-group.scss
│   │       │   │   └── _avatar.scss
│   │       │   ├── badges
│   │       │   │   ├── _badge-circle.scss
│   │       │   │   ├── _badge-dot.scss
│   │       │   │   ├── _badge-floating.scss
│   │       │   │   └── _badge.scss
│   │       │   ├── breadcrumbs
│   │       │   │   └── _breadcrumb.scss
│   │       │   ├── buttons
│   │       │   │   ├── _button-brand.scss
│   │       │   │   ├── _button-group.scss
│   │       │   │   ├── _button-icon.scss
│   │       │   │   └── _button.scss
│   │       │   ├── cards
│   │       │   │   ├── _card-animations.scss
│   │       │   │   ├── _card-blockquote.scss
│   │       │   │   ├── _card-money.scss
│   │       │   │   ├── _card-pricing.scss
│   │       │   │   ├── _card-profile.scss
│   │       │   │   ├── _card.scss
│   │       │   │   └── _card-stats.scss
│   │       │   ├── charts
│   │       │   │   └── _chart.scss
│   │       │   ├── close
│   │       │   │   └── _close.scss
│   │       │   ├── collapse
│   │       │   │   └── _accordion.scss
│   │       │   ├── content
│   │       │   │   └── _main-content.scss
│   │       │   ├── custom-forms
│   │       │   │   ├── _custom-checkbox.scss
│   │       │   │   ├── _custom-control.scss
│   │       │   │   ├── _custom-form.scss
│   │       │   │   ├── _custom-radio.scss
│   │       │   │   └── _custom-toggle.scss
│   │       │   ├── dropdowns
│   │       │   │   └── _dropdown.scss
│   │       │   ├── footers
│   │       │   │   └── _footer.scss
│   │       │   ├── forms
│   │       │   │   ├── _form-extend.scss
│   │       │   │   ├── _form.scss
│   │       │   │   ├── _form-validation.scss
│   │       │   │   └── _input-group.scss
│   │       │   ├── grid
│   │       │   │   └── _grid.scss
│   │       │   ├── headers
│   │       │   │   └── _header.scss
│   │       │   ├── icons
│   │       │   │   ├── _icon-actions.scss
│   │       │   │   ├── _icon.scss
│   │       │   │   └── _icon-shape.scss
│   │       │   ├── list-groups
│   │       │   │   ├── _list-check.scss
│   │       │   │   └── _list-group.scss
│   │       │   ├── maps
│   │       │   │   └── _map.scss
│   │       │   ├── masks
│   │       │   │   └── _mask.scss
│   │       │   ├── medias
│   │       │   │   ├── _media-comment.scss
│   │       │   │   └── _media.scss
│   │       │   ├── mixins
│   │       │   │   ├── _alert.scss
│   │       │   │   ├── _background-variant.scss
│   │       │   │   ├── _badge.scss
│   │       │   │   ├── _buttons.scss
│   │       │   │   ├── _custom-forms.scss
│   │       │   │   ├── _forms.scss
│   │       │   │   ├── _icon.scss
│   │       │   │   ├── _modals.scss
│   │       │   │   └── _popover.scss
│   │       │   ├── modals
│   │       │   │   └── _modal.scss
│   │       │   ├── navbars
│   │       │   │   ├── _navbar-collapse.scss
│   │       │   │   ├── _navbar-dropdown.scss
│   │       │   │   ├── _navbar-floating.scss
│   │       │   │   ├── _navbar.scss
│   │       │   │   ├── _navbar-search.scss
│   │       │   │   ├── _navbar-top.scss
│   │       │   │   └── _navbar-vertical.scss
│   │       │   ├── navs
│   │       │   │   ├── _nav-pills.scss
│   │       │   │   └── _nav.scss
│   │       │   ├── paginations
│   │       │   │   └── _pagination.scss
│   │       │   ├── popovers
│   │       │   │   └── _popover.scss
│   │       │   ├── progresses
│   │       │   │   └── _progress.scss
│   │       │   ├── reboot
│   │       │   │   └── _reboot.scss
│   │       │   ├── sections
│   │       │   │   └── _nucleo-icons.scss
│   │       │   ├── separators
│   │       │   │   └── _separator.scss
│   │       │   ├── shortcuts
│   │       │   │   └── _shortcut.scss
│   │       │   ├── tables
│   │       │   │   ├── _table-actions.scss
│   │       │   │   ├── _table.scss
│   │       │   │   └── _table-sortable.scss
│   │       │   ├── timeline
│   │       │   │   └── _timeline.scss
│   │       │   ├── type
│   │       │   │   ├── _article.scss
│   │       │   │   ├── _display.scss
│   │       │   │   ├── _heading.scss
│   │       │   │   └── _type.scss
│   │       │   ├── utilities
│   │       │   │   ├── _backgrounds.scss
│   │       │   │   ├── _blurable.scss
│   │       │   │   ├── _floating.scss
│   │       │   │   ├── _helper.scss
│   │       │   │   ├── _image.scss
│   │       │   │   ├── _opacity.scss
│   │       │   │   ├── _overflow.scss
│   │       │   │   ├── _position.scss
│   │       │   │   ├── _shadows.scss
│   │       │   │   ├── _sizing.scss
│   │       │   │   ├── _spacing.scss
│   │       │   │   ├── _text.scss
│   │       │   │   └── _transform.scss
│   │       │   └── vendors
│   │       │       ├── _bootstrap-datepicker.scss
│   │       │       ├── _bootstrap-tagsinput.scss
│   │       │       ├── _chartjs.scss
│   │       │       ├── _datatables.scss
│   │       │       ├── _dropzone.scss
│   │       │       ├── _fullcalendar.scss
│   │       │       ├── _headroom.scss
│   │       │       ├── _jvectormap.scss
│   │       │       ├── _lavalamp.scss
│   │       │       ├── _nouislider.scss
│   │       │       ├── _quill.scss
│   │       │       ├── _scrollbar.scss
│   │       │       ├── _select2.scss
│   │       │       └── _sweet-alert-2.scss
│   │       └── custom
│   │           ├── _components.scss
│   │           ├── _functions.scss
│   │           ├── _mixins.scss
│   │           ├── _utilities.scss
│   │           ├── _variables.scss
│   │           └── _vendors.scss
│   ├── js
│   │   ├── app.js
│   │   └── bootstrap.js
│   ├── lang
│   │   └── en
│   │       ├── auth.php
│   │       ├── pagination.php
│   │       ├── passwords.php
│   │       └── validation.php
│   └── views
│       ├── alerts
│       │   ├── errors.blade.php
│       │   ├── error_self_update.blade.php
│       │   ├── feedback.blade.php
│       │   ├── migrations_check.blade.php
│       │   └── success.blade.php
│       ├── auth
│       │   ├── login.blade.php
│       │   ├── passwords
│       │   │   ├── email.blade.php
│       │   │   └── reset.blade.php
│       │   ├── register.blade.php
│       │   └── verify.blade.php
│       ├── categories
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── index.blade.php
│       ├── forms
│       │   └── header.blade.php
│       ├── layouts
│       │   ├── app.blade.php
│       │   ├── footers
│       │   │   ├── auth.blade.php
│       │   │   ├── guest.blade.php
│       │   │   └── nav.blade.php
│       │   ├── headers
│       │   │   ├── auth.blade.php
│       │   │   ├── breadcrumbs.blade.php
│       │   │   ├── cards.blade.php
│       │   │   └── guest.blade.php
│       │   └── navbars
│       │       ├── navbar.blade.php
│       │       ├── navs
│       │       │   ├── auth.blade.php
│       │       │   └── guest.blade.php
│       │       └── sidebar.blade.php
│       ├── pages
│       │   ├── buttons.blade.php
│       │   ├── calendar.blade.php
│       │   ├── cards.blade.php
│       │   ├── charts.blade.php
│       │   ├── components.blade.php
│       │   ├── dashboard-alternative.blade.php
│       │   ├── dashboard.blade.php
│       │   ├── datatables.blade.php
│       │   ├── elements.blade.php
│       │   ├── googlemaps.blade.php
│       │   ├── grid.blade.php
│       │   ├── icons.blade.php
│       │   ├── lock.blade.php
│       │   ├── notifications.blade.php
│       │   ├── pricing.blade.php
│       │   ├── sortable.blade.php
│       │   ├── tables.blade.php
│       │   ├── timeline.blade.php
│       │   ├── typography.blade.php
│       │   ├── validation.blade.php
│       │   ├── vectormaps.blade.php
│       │   ├── welcome.blade.php
│       │   └── widgets.blade.php
│       ├── profile
│       │   └── edit.blade.php
│       ├── roles
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── index.blade.php
│       └── users
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── index.blade.php
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── screens
├── server.php
├── storage
│   ├── app
│   │   └── public
│   ├── framework
│   │   ├── cache
│   │   │   └── data
│   │   ├── sessions
│   │   ├── testing
│   │   └── views
│   └── logs
├── tests
│   ├── CreatesApplication.php
│   ├── Feature
│   │   └── ExampleTest.php
│   ├── TestCase.php
│   └── Unit
│       └── ExampleTest.php
└── webpack.mix.js
```


## Browser Support

At present, we officially aim to support the last two versions of the following browsers:

<img src="https://github.com/creativetimofficial/public-assets/blob/master/logos/chrome-logo.png?raw=true" width="64" height="64"> <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/firefox-logo.png" width="64" height="64"> <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/edge-logo.png" width="64" height="64"> <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/safari-logo.png" width="64" height="64"> <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/opera-logo.png" width="64" height="64">

- Demo: <https://argon-dashboard-laravel.creative-tim.com/?ref=mdlp-readme>
- Download Page: <https://www.creative-tim.com/product/argon-dashboard-laravel?ref=mdl-readme>
- Documentation: <https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html>
- License Agreement: <https://www.creative-tim.com/license>
- Support: <https://www.creative-tim.com/contact-us>
- Issues: [Github Issues Page](https://github.com/laravel-frontend-presets/argon-dashboard/issues)

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Reporting Issues

We use GitHub Issues as the official bug tracker for the Material Dashboard Laravel. Here are some advices for our users that want to report an issue:

1. Make sure that you are using the latest version of the Material Dashboard Laravel. Check the CHANGELOG from your dashboard on our [website](https://www.creative-tim.com/?ref=mdl-readme).
2. Providing us reproducible steps for the issue will shorten the time it takes for it to be fixed.
3. Some issues may be browser specific, so specifying in what browser you encountered the issue might help.

## Useful Links

- [Tutorials](https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w)
- [Affiliate Program](https://www.creative-tim.com/affiliates/new) (earn money)
- [Blog Creative Tim](http://blog.creative-tim.com/)
- [Free Products](https://www.creative-tim.com/bootstrap-themes/free) from Creative Tim
- [Premium Products](https://www.creative-tim.com/bootstrap-themes/premium?ref=mdl-readme) from Creative Tim
- [React Products](https://www.creative-tim.com/bootstrap-themes/react-themes?ref=mdl-readme) from Creative Tim
- [Angular Products](https://www.creative-tim.com/bootstrap-themes/angular-themes?ref=mdl-readme) from Creative Tim
- [VueJS Products](https://www.creative-tim.com/bootstrap-themes/vuejs-themes?ref=mdl-readme) from Creative Tim
- [More products](https://www.creative-tim.com/bootstrap-themes?ref=mdl-readme) from Creative Tim
- Check our Bundles [here](https://www.creative-tim.com/bundles??ref=mdl-readme)

### Social Media

### Creative Tim:

Twitter: <https://twitter.com/CreativeTim?ref=mdl-readme>

Facebook: <https://www.facebook.com/CreativeTim?ref=mdl-readme>

Dribbble: <https://dribbble.com/creativetim?ref=mdl-readme>

Instagram: <https://www.instagram.com/CreativeTimOfficial?ref=mdl-readme>

### Updivision:

Twitter: <https://twitter.com/updivision?ref=mdl-readme>

Facebook: <https://www.facebook.com/updivision?ref=mdl-readme>

Linkedin: <https://www.linkedin.com/company/updivision?ref=mdl-readme>

Updivision Blog: <https://updivision.com/blog/?ref=mdl-readme>

## Credits

- [Creative Tim](https://creative-tim.com/)
- [Updivision](https://updivision.com)

## License

[MIT License](https://github.com/laravel-frontend-presets/argon/blob/master/license.md).

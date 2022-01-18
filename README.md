Backpack for Laravel Skeleton
===

## Install

- `composer update`
- Configure database connection.
- `php artisan migrate`
- `php artisan backpack:user`
- `php artisan storage:link`

## Configure

### Configure Project

- File `config/backpack/base.php`: `project_name`, `project_logo`, `developer_name`, `developer_link`.

### Remove Laravel example page

- Delete view `resources/views/welcome.blade.php`.
- Remove route in `routes/web.php`.

### Remove Backpack's error pages

- Delete folder `resources/views/vendor/errors`.

### Configure Laravel Idea plugin

Open setting: File > Settings > Languages & Frameworks > Laravel Idea > Module System:

- Module system: Choose **Directory modules as composer.json packages**.
- Root directory path: Enter **packages**.
- Check both **Lowercase translation namespaces** and **Allow app root module in code generation dialogs**.

## Frontend

- Open Terminal/Command Prompt and go to directory `packages/web_fe`.
- `npm install`.
- Compile assets:
  - Develop: `npm run dev` or `npm run watch`.
  - Production: `npm run prod`.


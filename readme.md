# Platform.sh Laravel Example

An example Laravel project demonstrating how to set up your project on [https://platform.sh](Platform.sh).  This began as a bare bones application and is currently evolving into becoming a blog so I can learn a bit more about how Laravel works internally.

## Important stuff

The gist of what you need to know to make your Laravel app run can be found in the following files - 

- `composer.json` (we use the [https://github.com/platformsh/platformsh-php-helper](platformsh/config-reader) composer package to fetch configs)
- `config/app.php`
- `config/database.php`
- `config/cache.php`
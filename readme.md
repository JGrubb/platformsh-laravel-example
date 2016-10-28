# Platform.sh Laravel Example

An example Laravel project demonstrating how to set up your project on [Platform.sh](https://platform.sh).  This began as a bare bones application and is currently evolving into becoming a blog so I can learn a bit more about how Laravel works internally.

## Important stuff

The gist of what you need to know to make your Laravel app run can be found in the following files - 

- `composer.json` (we use the [https://github.com/platformsh/platformsh-php-helper](platformsh/config-reader) composer package to fetch configs)
- `config/app.php` - we fetch Platform variables here
- `config/database.php` - we fetch Platform services config here
- the two files in the `.platform` directory.  I'm using Postgres for this example in `services.yaml`.
- and of course '.platform.app.yaml'.  This file continues to evolve as I learn more about Laravel and what it needs to integrate deeply with Platform.sh

# Turbo Laravel Website

Source code of the [Turbo Laravel website](https://turbo-laravel.com).

## Local Development

If you want to work on this project locally, you may follow these instructions:

1. Checkout the source code:

```bash
git clone git@github.com:tonysm/turbo-laravel.com turbo-laravel.com
```

2. Copy the `.env.example` to `.env`:

```bash
cp .env.example .env
```

3. We ship with a Laravel Sail setup, so you may pull the composer dependencies first:

```bash
# If you have PHP >=8.1 installed locally with Composer:
composer install

# If you don't have PHP installed, but have Docker:
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

4. Pull all docs sources and create the docs symlinks:

From your local machine (needs access your GitHub user to clone):

```bash
source ./bin/docs-pull.sh
```

Next, create the symlinks from sail:

```bash
# First, get a shell:
sail shell
# Next, create the symlinks:
source bin/docs-symlinks.sh
```

5. Boot the containers:

```bash
sail up -d
```

6. Download the Latest version of the TailwindCSS bin and start a watcher:

```bash
sail artisan tailwindcss:download
sail artisan tailwindcss:watch
```

7. Run the storage symlink command (needed for [Importmap Laravel](https://github.com/tonysm/importmap-laravel)):

```bash
sail artisan storage:link
```

8. Open the browser at [http://localhost](http://localhost)

Alternatively, you may prefer to run the project another way. Make sure you

### Torchlight Integration

We're using Torchlight for code highlight, so head out to their website, create an account, generate a token and update the `TORCHLIGHT_TOKEN` entry on your `.env` file with it:

```dotenv
TORCHLIGHT_TOKEN=your-token
```

# FHA Catalog

## Install

Make sur to use PHP 8.2 or higher.

```
composer install
```

And node 18 or higher.

```
npm install
```

Create `.env`:

```
cp .env.example .env
```

Create `database/database.sqlite`:

```
touch database/database.sqlite
```

Generate app key:

```
php artisan key:generate
```

Run migrations and seeders:

```
php artisan migrate --seed
```

## Run

In two terminals, run Laravel local server:

```
php artisan serve
```

Run vite to build front-end assets with hot-reloading:

```
npm run dev
```
1. Install Laravel 11 using following command in the existing directory

```bash
composer create-project laravel/laravel .
```

or use the project name to create a new directory

```bash
composer create-project laravel/laravel my-project
```

2. Install vue2

```bash
npm i @vitejs/plugin-vue2
```

3. Install **Tailwind CSS**

```bash
npm install -D tailwindcss postcss autoprefixer
```

And configure it

```bash
npx tailwindcss init -p
```

For more information: https://tailwindcss.com/docs/guides/laravel

## How to play the game

There two versions of game: Game with GUI(Graphical User Interface) and CLI(Command line interface).

To play using GUI, just run following command in your terminal:

```bash
php artisan serve
```

Laravel runs the application on this host and port: http://127.0.0.1:8000. You will see the console output what is the address laravel application provided.

To play using CLI, just run following command in your terminal in the root project directory:

```bash
php prompt.php
```

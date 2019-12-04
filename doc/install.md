# Установка laravel

```
composer create-project --prefer-dist laravel/laravel blog
```

## Дополнительные пакеты
```
composer require laravelcollective/html jenssegers/date predis/predis laravel/ui davejamesmiller/laravel-breadcrumbs:5.x
```

**jenssegers/date**
config/app.php добавить:
 в секцию `'providers'`:
```
'Jenssegers\Date\DateServiceProvider',
```
 в секцию `'alias'`:
```
'Date' => Jenssegers\Date\Date::class,
```

**davejamesmiller/laravel-breadcrumbs**

Create a file called routes/breadcrumbs.php that looks like this:
```
<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
```
Скопировать конфиг:
```
php artisan vendor:publish --tag=breadcrumbs-config
```
Then open config/breadcrumbs.php and edit this line:
```
'view' => 'breadcrumbs::bootstrap4',
```


## Дополнительные dev пакеты
```
composer require --dev barryvdh/laravel-debugbar barryvdh/laravel-ide-helper
```

в секцию `"scripts":` `composer.json` добавить:
```
"post-update-cmd": [
    "Illuminate\\Foundation\\ComposerScripts::postUpdate",
    "@php artisan ide-helper:generate",
    "@php artisan ide-helper:meta"
]
```
скопировать конфиг файл:
```
php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config
```
config/ide-helper.php -- установить параметр `include_fluent` в `true`

**Установить фронт**
```
yarn install && yarn run dev
```

**Скафолдинг авторизации**
```
php artisan ui vue --auth
```
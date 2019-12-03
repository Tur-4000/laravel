# Установка laravel

```
composer create-project --prefer-dist laravel/laravel blog
```

## Дополнительные пакеты
```
composer require laravelcollective/html jenssegers/date predis/predis laravel/ui
```

config/app.php добавить:
 в секцию `'providers'`:
```
'Jenssegers\Date\DateServiceProvider',
```
 в секцию `'alias'`:
```
'Date' => Jenssegers\Date\Date::class,
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
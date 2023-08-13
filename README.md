﻿# dynamic-language

Installation

```
composer require shibleshakil/dynamic-language --dev-main
```

add the ServiceProvider to the providers array in config/app.php
```
shibleshakil\DynamicLanguage\DynamicLanguageServiceProvider::class
```

Copy the package config to your local config with the publish command:
```
php artisan vendor:publish --provider="shibleshakil\DynamicLanguage\DynamicLanguageServiceProvider" --tag="config"
```


migrate the language table
```
php artisan migrate
```

Description

get the dafault local by calling
```
shibleshakil\DynamicLanguage\TranslationHelper::getDefaultLanguage()
```

add new language file
```
shibleshakil\DynamicLanguage\TranslationHelper::addLanguageFile($lang)
```

update language key value
```
shibleshakil\DynamicLanguage\TranslationHelper::translateKey($key, $lang)
```
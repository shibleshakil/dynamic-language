# dynamic-language

The Laravel package called "dynamic-language" makes localization management easier, 
by handling missing keys in language files. It smoothly generates language files 
for each added language making localization efforts more streamlined. 
Moreover it takes care of configuring locale settings ensuring seamless transitions between languages. 
Developers looking for well organized localization support, in their Laravel applications will find this package to be a valuable tool.

Installation

```
composer require shibleshakil/dynamic-language
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

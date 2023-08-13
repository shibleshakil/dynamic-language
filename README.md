# dynamic-language: Laravel Localization Management Simplified!

The **dynamic-language** Laravel package simplifies localization management, making it effortless to handle missing keys in language files. 
It seamlessly generates language files for each newly added language, enhancing the efficiency of your localization efforts. Additionally, 
it takes care of configuring locale settings, ensuring smooth transitions between languages. 
Developers seeking well-organized localization support for their Laravel applications will find this package to be an invaluable tool.

## Installation

To incorporate the **dynamic-language** package into your Laravel project, use Composer:

```
composer require shibleshakil/dynamic-language
```
Next, add the service provider to your config/app.php file:

```
shibleshakil\DynamicLanguage\DynamicLanguageServiceProvider::class
```

Copy the package config to your local config and migration file to your local migration directory with the publish command:

```
php artisan vendor:publish --provider="shibleshakil\DynamicLanguage\DynamicLanguageServiceProvider" --tag="config"

```

Finally, migrate the language table:

```
php artisan migrate
```

## Usage

Retrieve the default locale by calling:

```
shibleshakil\DynamicLanguage\TranslationHelper::getDefaultLanguage()

```

Add a new language file:

```
shibleshakil\DynamicLanguage\TranslationHelper::addLanguageFile($lang)

```

Update language key values:

```
shibleshakil\DynamicLanguage\TranslationHelper::translateKey($key, $lang)
```

Make your Laravel application's localization journey smoother with dynamic-language.


## Contribution

We welcome contributions from the community! Feel free to submit issues and pull requests to enhance this package.

## License

This package is open-source and distributed under the MIT License.


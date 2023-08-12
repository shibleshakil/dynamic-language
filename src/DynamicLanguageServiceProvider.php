<?php

namespace shibleshakil\DynamicLanguage;

use Illuminate\Support\ServiceProvider;

class DynamicLanguageServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->extend('translator', function ($translator, $app) {
            $translator = new CustomTranslator($app['translation.loader'], $app['config']['app.locale']);

            $translator->setFallback($app['config']['app.fallback_locale']);
            // Get the default language
            $defaultLanguage = TranslationHelper::getDefaultLanguage();

            // // Set the default language
            $translator->setLocale($defaultLanguage);

            return $translator;
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/dynamic-language.php' => config_path('dynamic-language.php'),
                __DIR__.'/database/migrations/' => database_path('migrations'),
            ], 'config');

        }

    }
}

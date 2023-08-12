<?php

namespace shibleshakil\DynamicLanguage;

use Illuminate\Translation\Translator;

class CustomTranslator extends Translator
{
    /**
     * Get the translation for the given key.
     *
     * @param  string  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @param  bool  $fallback
     * @return string|array|null
     */
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        // Use the provided $locale or the current application locale
        $locale = $locale ?: $this->locale;

        $translation = parent::get($key, $replace, $locale, $fallback);

        // Check if the translation key is missing in the language JSON file
        if ($translation === $key) {
            // Add the missing key to the language JSON file
            TranslationHelper::addMissingKey($key, [$locale]);
        }

        return $translation;
    }
}

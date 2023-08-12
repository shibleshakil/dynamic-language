<?php

namespace shibleshakil\DynamicLanguage;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TranslationHelper
{
    // automatically adds missing key in the language file
    public static function addMissingKey($mkey = '', $locales = [])
    {
        $locales = Language::where('status', 1)->get()->pluck('code')->toArray();

        foreach ($locales as $langFile) {
            $path = resource_path('lang/'.$langFile.'.json');
            $translations = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
            if (!array_key_exists($mkey, $translations)) {
                $translations[$mkey] = '';
                file_put_contents($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        }

    }



    // creates new language file
    public static function addLanguageFile($lang)
    {
        $path = resource_path("lang/{$lang}.json");

        if (!file_exists($path)) {
            $translations = [];
            file_put_contents($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

    }



    // updates new language file
    public function translateKey($key, $code){
        $jsonPath = resource_path('lang/'.$code.'.json'); // Path to the JSON file
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath); // Read the JSON file contents
            $datas = json_decode($jsonContent, true);
            $datas[$key] = $value;
            file_put_contents($jsonPath, json_encode($datas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return "Key value updated";
        }

        return "Key not found";

    }



    //gets the default language from language table
    public static function getDefaultLanguage()
    {
        $data = Language::where('status', 1)->get()->toArray();
        $code = 'en';
        $direction = 'ltr';
        foreach ($data as $ln) {
            if (array_key_exists('default', $ln) && $ln['default']) {
                $code = $ln['code'];
                if (array_key_exists('direction', $ln)) {
                    $direction = $ln['direction'];
                }
            }
        }

        session()->put('local', $code);
        Session::put('direction', $direction);
        $lang = $code;

        return $lang;

    }

}

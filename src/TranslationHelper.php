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
            $path = \App::langPath().'/'.$langFile.'.json';
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
        $path = \App::langPath().'/'.$lang.'.json';

        if (!file_exists($path)) {
            $translations = [];
            file_put_contents($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

    }



    // get transabled keys
    public static function allTransabledKeys($locale)
    {
        $jsonPath = \App::langPath().'/'.$locale.'.json'; // Path to the JSON file

        $datas = [];

        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath); // Read the JSON file contents
            $datas = json_decode($jsonContent, true);
        }

        return $datas;

    }



    // updates key value in language file
    public static function translateKey($key, $value, $locale){
        $jsonPath = \App::langPath().'/'.$locale.'.json'; // Path to the JSON file
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

<?php

namespace App\Services;

use App\ViewModels\Admin\Category\CategoryViewModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class AdminService
{
    public static function getDefaultCarbonDateTimeFormat(): string
    {
        return 'd.m.Y H:i:s';
    }

    public static function getDefaultCarbonDateFormat(): string
    {
        return 'd.m.Y';
    }

    public static function getPaginationLimit(): int
    {
        return 15;
    }

    public static function slug($text): string
    {
        return self::transliterate($text);
    }

    public static function transliterate($str): string
    {
        $str = mb_strtolower($str, 'UTF-8');
        if (!self::checkCyrillic($str)) {
            return Str::slug($str);
        }
        $str = Str::lower($str);
        $tr = [
            "а" => "a",
            "б" => "b",
            "в" => "v",
            "г" => "g",
            "д" => "d",
//            "у" => "e",
            "ё" => "yo",
            "ж" => "j",
            "з" => "z",
            "и" => "i",
            "й" => "y",
            "к" => "k",
            "л" => "l",
            "м" => "m",
            "н" => "n",
            "о" => "o",
            "п" => "p",
            "р" => "r",
            "с" => "s",
            "т" => "t",
            "у" => "u",
            "ф" => "f",
            "х" => "x",
            "ц" => "s",
            "ч" => "ch",
            "ш" => "sh",
            "щ" => "sh",
            "ъ" => "",
            "ы" => "i",
            "ь" => "",
            "э" => "e",
            "ю" => "yu",
            "я" => "ya",
        ];
        $str = strtr($str, $tr);
        return Str::slug($str);
    }

    public static function checkCyrillic($text): bool
    {
        return preg_match('/[А-Яа-яЁё]/u', $text);
    }

    public static function getLang(): array
    {
        return [
            [
                'code' => 'ru',
                'name' => 'Русский',
                'icon' => 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/ru.svg',
                'img' => '<img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/ru.svg" alt="ru" style="width: 20px"/>'
            ],
            // [
            //     'code' => 'uz',
            //     'name' => 'O\'zbekcha',
            //     'icon' => 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/uz.svg',
            //     'img' => '<img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/uz.svg"  alt="uz" style="width: 20px"/>'
            // ],
           [
               'code' => 'en',
               'name' => 'English',
               'icon' => 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/us.svg',
               'img' => '<img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/us.svg" style="width: 20px"/>'
           ],
        ];
    }

    public static function checkLocale(string $locale): bool
    {
        $locales = Arr::pluck(self::getLang(), "code");
        return in_array($locale, $locales);
    }

    public static function setLocalePrefix(): ?string
    {
        $locale = request()->segment(1);
        if ($locale) {
            if (AdminService::checkLocale($locale)) {
                app()->setLocale($locale);
                return $locale;
            }
            return null;
        }
        return null;
    }

    public static function getLocales(): Collection
    {
        $lang = self::getLang();
        $path = request()->path();

        return collect($lang)->map(function ($lang) use ($path) {
            $code = Arr::get($lang, "code");
            return [
                "code" => $code,
                "name" => Arr::get($lang, "name"),
                "icon" => Arr::get($lang, "icon"),
                "is_current_locale" => app()->getLocale() === Arr::get($lang, "code"),
                "translated_url" => (app()->getLocale() === config("app.fallback_locale")) ? "$code/$path" : Str::replaceFirst(app()->getLocale(), $code, $path)
            ];
        });
    }

    public static function trans($array, $locale = null, $json = false): string
    {
        if ($json === true) {
            $array = (array)json_decode($array);
        }

        if (!$locale) {
            $locale = app()->getLocale();
        }
        return $array[$locale] ?? $array[config("app.fallback_locale")] ?? 'null';
    }

    public static function transForeach($array, $type = 'children', $int = 1)
    {
        if ($type === 'children') {
            $children = $array->children;
            if ($int === 2 && count($children) == 0) {
                return new CategoryViewModel($array);
            }
            foreach ($children as $key => $value) {
                $array->children[$key] = self::transForeach($value, 2);
            }
        } else {
            $ancestors = $array->ancestors;
            if ($int === 2 && count($ancestors) == 0) {
                return new CategoryViewModel($array);
            }
            foreach ($ancestors as $key => $value) {
                $array->ancestors[$key] = self::transForeach($value, 2);
            }
        }
        return new CategoryViewModel($array);
    }

    public static function statusTextName($status_id): bool
    {
        $status = [
            0 => 'Отключено',
            1 => 'Включено',
        ];
        return array_key_exists($status_id, $status) ? $status[$status_id] : false;
    }

    public static function textToArray(string $data): array
    {
        return (array)json_decode($data);
    }

    public static function arrayToText(array $data): string
    {
        return (string)json_encode($data);
    }

    public static function pricePrint($price): string
    {
        return number_format($price, 0, '', ' ');
    }
}

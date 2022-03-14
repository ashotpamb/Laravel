<?php

namespace App\Services\middleware;

class CheckLanguageService
{
    public function checkLanguage($text)
    {
        $checker = true;
        preg_match_all('/([a-zA-Z]+)/i', $text, $result);
        if(empty($result[0])) {
            $checker = false;
        }
        return $checker;
    }
}

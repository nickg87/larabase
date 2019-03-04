<?php
//

if (!function_exists('getFromDateAttribute')) {
    function getFromDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d M Y');
    }
}

if (!function_exists('getFormatUri')) {
    function getFormatUri($string, $separator = '-')
    {
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        $special_cases = array('&' => 'and', "'" => '');
        $string = mb_strtolower(trim($string), 'UTF-8');
        $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
        $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
        $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
        $string = preg_replace("/[$separator]+/u", "$separator", $string);
        return $string;
    }
}

if (!function_exists('getFormatBannerTitle')) {
    function getFormatBannerTitle($text)
    {
        $string='';
        $items=explode(' ',$text);
        foreach ($items as $keyItem=>$item) {
            if ($keyItem == 0) {
                $string .= '<span class="color-b">' . $item . ' </span>';
            } else if ($keyItem == 2) {
                $string .= '<br>'.$item;
            } else {
                $string .= ' ' . $item;
            }
        }
        return $string;
    }
}

?>
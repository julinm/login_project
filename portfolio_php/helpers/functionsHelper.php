<?php

/**
 * Function that cleans a string to show it
 * params string $string
 * return $string
 */
function cleanString($string){
    
    return  trim(ucwords(mb_strtolower($string)));

}

/**
 * Function that cleans a string to show it
 * params string $string
 * return $cleanString
 */
function escapeCharacters($string){
    
    if(strstr('/', $string)){
        $string = str_replace('/', '\/', $string);
    }

    if(strstr('-', $string)){
        $string = str_replace('-', '\-', $string);
    }

    $cleanString = $string;

    return  trim($cleanString);

}
?>
<?php

class Url {
    /**
     * @return Boolean
     * true if the given URL is valid and is not a 404, else
     * false.
     */
    public static function isValid($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Short');
        curl_setopt($ch, CURLOPT_NOBODY, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        $response = curl_exec($ch);
        if(curl_getinfo($ch, CURLINFO_HTTP_CODE) == '404') {
            return false;
        }
        curl_close($ch);
        return true;
    }
}

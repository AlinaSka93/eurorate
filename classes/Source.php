<?php

class Source {
    public $name;
    public $link;
    public $priority;
    
    function isAvailable(){
        $url = $this->link;
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return false;
        }        
        $curlInit = curl_init($url);
        curl_setopt($curlInit, CURLOPT_TIMEOUT, 5);
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curlInit);
        $httpCode = curl_getinfo($curlInit, CURLINFO_HTTP_CODE);
        curl_close($curlInit);
        if($httpCode == 200) {
            return true;
        } else {
            if (@fopen($url, "r")) {
                return true;
            } 
        }
        return false;
    }
    
}

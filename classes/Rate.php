<?php

class Rate {
    public $valute = 'EUR';
    public $source;
    public $value;
    
    function getFromCBR($url){
        $data = json_decode(file_get_contents($url));
        $this->value = $data->Valute->EUR->Value;
        $this->source = "ЦБ РФ";
    }
    
    function getFromECB($url){
        $data = simplexml_load_file($url);
        $valutes = $data->Cube->Cube->Cube;
        foreach($valutes as $item){
            if ($item["currency"]=="RUB"){
                $this->value = $item["rate"];
                break;
            }
        }
        $this->source = "ЕЦБ";
    }
}

<?php

class Set{
    
    public $sources;
    
    function __construct(){
        $this->sources = array();
        $this->sources[] = new Source();
        $this->sources[0]->link = "http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml";
        $this->sources[0]->name = "ECB";
        $this->sources[0]->priority = 1;
        $this->sources[] = new Source();
        $this->sources[1]->link = "https://www.cbr-xml-daily.ru/daily_json.js";
        $this->sources[1]->name = "CBR";
        $this->sources[1]->priority = 2;
    }
    
    function sortByParam($param){
        $arr = $this->sources;
        $count = count($arr);
        if ($count <= 1) {
            $this->sources = $arr;
            return;
        } 
        for ($i = 0; $i < $count; $i++) {
            for ($j = $count - 1; $j > $i; $j--) {
                if ($arr[$j]->$param < $arr[$j - 1]->$param) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j - 1];
                    $arr[$j - 1] = $tmp;
                }
            }
        } 
        $this->sources = $arr;
        return;
    }
}

<?php

include 'classes/Source.php';
include 'classes/Rate.php';
include 'classes/Set.php';

$set = new Set();
$set->sortByParam('priority');
$sources = $set->sources;
$rate = new Rate;
foreach($sources as $src){
    if($src->isAvailable()){
        switch ($src->name) {
            case 'ECB':
                $rate->getFromECB($src->link);
                break;
            case 'CBR':
                $rate->getFromCBR($src->link);
                break;
        }
        echo "Курс {$rate->valute} по {$rate->source} на сегодня: {$rate->value} руб.";
        return;
    }
}
echo "Курс {$rate->valute} недоступен";
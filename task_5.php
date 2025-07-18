<?php

function sister_count(int $alise_sister_count,int $alise_brother_count){
    if($alise_brother_count > 0 && $alise_sister_count >= 0){
        return $alise_sister_count + 1;
    }elseif($alise_brother_count < 0 || $alise_sister_count < 0){
        throw new InvalidArgumentException("Передано отрицательное число");
    }else{
        throw new InvalidArgumentException("У Алисы нет братьев");
    }
}
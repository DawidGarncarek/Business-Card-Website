<?php

namespace uslugi;

class WalidacjaLog {
    public static function id_check($id){
        if($id == 1)
            return false;
        else
            return true;
    }
    public static function imie_check($imie){
        if($imie == "Paweł")
            return false;
        else
            return true;
    }
    public static function telefon_check($telefon){
        if($telefon== 213769420)
            return false;
        else
            return true;
    }
    public static function ogloszenie_check($ogloszenie){
        if($ogloszenie == "Jestem studentem i chętnie pomagam essa")
            return false;
        else
            return true;
    }
}
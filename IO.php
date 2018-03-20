<?php
class IO{
    public function getName():string{
        echo "Name: ";
        return readline();
    }
    public function getSurname():string{
        echo "Surname: ";
        return readline();
    }
    public function getSex():string{
        echo "Sex(M/F): ";
        return readline();
    }
    public function getYear():string{
        echo "Year: ";
        return readline();
    }
    public function getMonth():string{
        echo "Month: ";
        return readline();
    }
    public function getDay():string{
        echo "Day: ";
        return readline();
    }
    public function getProvince():string{
        echo "Province: ";
        return readline();
    }
    public function getCity():string{
        echo "City: ";
        return readline();
    }
    public function print(string $s){
        echo $s."\n";
    }
}

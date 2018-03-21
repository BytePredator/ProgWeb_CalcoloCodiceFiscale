<?php
interface IOInterface{
    public function getSurname():string;

    public function getName():string;

    public function getSex():string;
    
    public function getYear():string;

    public function getMonth():string;

    public function getDay():string;

    public function getProvince():string;

    public function getCity():string;

    public function print(string $s);
}

<?php
spl_autoload_register(function($name){
    if(file_exists($name.".php")){
        include $name.".php";
    }
});

$io = new IO();

$surname = strtoupper($io->getSurname());
$name = strtoupper($io->getName());
$sex = strtoupper($io->getSex());

$year = $io->getYear();
$month = $io->getMonth();
$day = $io->getDay();
$date = new DateTime("$year-$month-$day");

$province = strtoupper($io->getProvince());
$city = strtoupper($io->getCity());
$city = new City($province, $city);

$person = new Person($name, $surname, $sex, $date, $city);

$codiceFiscale = CodiceFiscale::calcCodiceFiscale($person);

$io->print("CodiceFiscale: ".$codiceFiscale);

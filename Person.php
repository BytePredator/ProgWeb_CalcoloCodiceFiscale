<?php
class Person{
    private $name;
    private $surname;
    private $sex;
    private $date;
    private $city;
    private $codiceFiscale;

    public function __construct(string $name, string $surname, string $sex, DateTime $date, City $city){
        $this->name = $name;
        $this->surname = $surname;
        $this->sex = $sex;
        $this->city = $city;
        $this->date = $date;
    }

    public function getSurname():string{
        return $this->surname;
    }

    public function getName():string{
        return $this->name;
    }

    public function getSex():string{
        return $this->sex;
    }

    public function getDate():DateTime{
        return $this->date;
    }

    public function getCity():City{
        return $this->city;
    }

    public function getCodiceFiscale():string{
        return $this->codiceFiscale;
    }

    public function setCodiceFiscale(string $codiceFiscale){
        $this->codiceFiscale = $codiceFiscale;
    }
}

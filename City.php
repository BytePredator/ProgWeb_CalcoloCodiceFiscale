<?php
class City{
    private $province;
    private $city;
    private $code;
    private static $filePath = "codici_comuni_italiani.txt";

    public function __construct(string $province, string $city){
        $this->province = $province;
        $this->city = $city;
        $this->loadCityCode();
    }

    public function getCode():string{
        return $this->code;
    }

    private function loadCityCode(){
        $handle = fopen(City::$filePath, "r");
        // inserire controlli sul file: esiste, è leggibile, ....
        while (!feof($handle)){
            $buffer = fgets($handle);   // legge una riga intera da file
            $buffer = rtrim($buffer);   // rimuove carattere di return a fine riga

            list($code, $city, $province) = explode (";", $buffer);  // divide la stringa in tre rispetto al separatore ; usato nel file

            if(strtoupper($province) == $this->province){
                if(strtoupper($city) == $this->city){
                    $this->code = strtoupper($code);
                    break;
                }
            }
        }
        fclose($handle);  // The file pointed to by handle is closed.
    }
}

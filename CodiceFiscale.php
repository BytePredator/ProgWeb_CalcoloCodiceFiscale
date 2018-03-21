<?php
class CodiceFiscale{
    public static function calcCodiceFiscale(Person $p){
        $r = CodiceFiscale::calcSurname($p->getSurname());
        $r .= CodiceFiscale::calcName($p->getName());
        $r .= CodiceFiscale::calcDate($p->getDate(), $p->getSex());
        $r .= $p->getCity()->getCode();
        $r .= CodiceFiscale::calcControlCode($r);
        $p->setCodiceFiscale($r);
        return $r;
    }

    private static function calcSurname(string $surname):string{
        $r = '';
        $c = preg_match_all('/[BCDFGHJKLMNPQRSTVWXYZ]/i', $surname, $matches);
        for($i=0; $i<count($matches[0]) && $i<3; $i++)
            $r .= $matches[0][$i];
        if($c>=3)
            return $r;
        $v = preg_match_all('/[AEIOU]/i', $surname, $matches);
        for($i=0; $i<count($matches[0]) && $i<3-$c; $i++)
            $r .= $matches[0][$i];
        if($c+$v>=3)
            return $r;
        for($i=0; $i+$c+$v<3; $i++)
            $r .= "X";
        return $r;
    }

    private static function calcName(string $name):string{
        $r = '';
        $c = preg_match_all('/[BCDFGHJKLMNPQRSTVWXYZ]/i', $name, $matches);
        if($c>=4)
            return $matches[0][0].$matches[0][2].$matches[0][3];
        for($i=0; $i<count($matches[0]) && $i<3; $i++)
            $r .= $matches[0][$i];
        if($c>=3)
            return $r;
        $v = preg_match_all('/[AEIOU]/i', $name, $matches);
        for($i=0; $i<count($matches[0]) && $i<3-$c; $i++)
            $r .= $matches[0][$i];
        if($c+$v>=3)
            return $r;
        for($i=0; $i+$c+$v<3; $i++)
            $r .= "X";
        return $r;
    }

    private static function calcDate(DateTime $date, string $sex):string{
        $r = $date->format('y');
        switch($date->format('n')){
            case 1:
                $r .= 'A';
                break;
            case 2:
                $r .= 'B';
                break;
            case 3:
                $r .= 'C';
                break;
            case 4:
                $r .= 'D';
                break;
            case 5:
                $r .= 'E';
                break;
            case 6:
                $r .= 'H';
                break;
            case 7:
                $r .= 'L';
                break;
            case 8:
                $r .= 'M';
                break;
            case 9:
                $r .= 'P';
                break;
            case 10:
                $r .= 'R';
                break;
            case 11:
                $r .= 'S';
                break;
            case 12:
                $r .= 'T';
                break;
        }
        $r .= str_pad($date->format('d')+($sex=='F'?40:0), 2, '0', STR_PAD_LEFT);
        return $r;
    }

    private static function calcControlCode(string $cf){
        $a = str_split($cf);
        $sum = 0;
        foreach($a as $k=>$v){
            if($k%2==0)
                $sum += CodiceFiscale::calcOddCharValue($v);
            else
                $sum += CodiceFiscale::calcEvenCharValue($v);
        }
        $r = $sum%26;
        switch($r){
            case 0:
                return 'A';
            case 1:
                return 'B';
            case 2:
                return 'C';
            case 3:
                return 'D';
            case 4:
                return 'E';
            case 5:
                return 'F';
            case 6:
                return 'G';
            case 7:
                return 'H';
            case 8:
                return 'I';
            case 9:
                return 'J';
            case 10:
                return 'K';
            case 11:
                return 'L';
            case 12:
                return 'M';
            case 13:
                return 'N';
            case 14:
                return 'O';
            case 15:
                return 'P';
            case 16:
                return 'Q';
            case 17:
                return 'R';
            case 18:
                return 'S';
            case 19:
                return 'T';
            case 20:
                return 'U';
            case 21:
                return 'V';
            case 22:
                return 'W';
            case 23:
                return 'X';
            case 24:
                return 'Y';
            case 25:
                return 'Z';
        }
    }

    private static function calcEvenCharValue(string $c):int{
        switch($c){
            case '0':
                return 0;
            case '1':
                return 1;
            case '2':
                return 2;
            case '3':
                return 3;
            case '4':
                return 4;
            case '5':
                return 5;
            case '6':
                return 6;
            case '7':
                return 7;
            case '8':
                return 8;
            case '9':
                return 9;
            case 'A':
                return 0;
            case 'B':
                return 1;
            case 'C':
                return 2;
            case 'D':
                return 3;
            case 'E':
                return 4;
            case 'F':
                return 5;
            case 'G':
                return 6;
            case 'H':
                return 7;
            case 'I':
                return 8;
            case 'J':
                return 9;
            case 'K':
                return 10;
            case 'L':
                return 11;
            case 'M':
                return 12;
            case 'N':
                return 13;
            case 'O':
                return 14;
            case 'P':
                return 15;
            case 'Q':
                return 16;
            case 'R':
                return 17;
            case 'S':
                return 18;
            case 'T':
                return 19;
            case 'U':
                return 20;
            case 'V':
                return 21;
            case 'W':
                return 22;
            case 'X':
                return 23;
            case 'Y':
                return 24;
            case 'Z':
                return 25;
        }
    }

    private static function calcOddCharValue(string $c):int{
        switch($c){
            case '0':
                return 1;
            case '1':
                return 0;
            case '2':
                return 5;
            case '3':
                return 7;
            case '4':
                return 9;
            case '5':
                return 13;
            case '6':
                return 15;
            case '7':
                return 17;
            case '8':
                return 19;
            case '9':
                return 21;
            case 'A':
                return 1;
            case 'B':
                return 0;
            case 'C':
                return 5;
            case 'D':
                return 7;
            case 'E':
                return 9;
            case 'F':
                return 13;
            case 'G':
                return 15;
            case 'H':
                return 17;
            case 'I':
                return 19;
            case 'J':
                return 21;
            case 'K':
                return 2;
            case 'L':
                return 4;
            case 'M':
                return 18;
            case 'N':
                return 20;
            case 'O':
                return 11;
            case 'P':
                return 3;
            case 'Q':
                return 6;
            case 'R':
                return 8;
            case 'S':
                return 12;
            case 'T':
                return 14;
            case 'U':
                return 16;
            case 'V':
                return 10;
            case 'W':
                return 22;
            case 'X':
                return 25;
            case 'Y':
                return 24;
            case 'Z':
                return 23;
        }
    }
}

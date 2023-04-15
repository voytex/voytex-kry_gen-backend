<?php

class ValueGenerator 
{
    function getPRvalues() 
    {
        echo "getPRValues()";
        //zadani: Test prvociselnosti

        $random = rand(1,2); //slouzi k vyberu prvocislo / slozene cislo
        //podle vyberu se operand $prime nastavi na True/False

        if ($random == 1) 
        {
            //prvocislo
            $X = rand(530, 10000);
            $C = gmp_nextprime($X); //vysledek

            $prime= True;
            return [$C, "ano"];
        } 
        else 
        {
            //slozene cislo
            for ($k = 1; $k = 1000; $k++)
            { //cyklus overujici, ze se jedna o slozene cislo ktere zaroven neni delitelne cisly 2 a 5 (at to neni obvious)

                $X = rand(1, 10000);

                for ($i = 2; $i <= $X/2; $i++)
                { 
                    if ($X % $i == 0 and $X % 2 != 0 and $X % 5 != 0) 
                    { 
                    //tady uz se mi zacyklil i mozek
                    break;
                    }
                }

                if ($X % $i == 0 and $X % 2 != 0 and $X % 5 != 0) 
                {
                    $C = $X; //vysledek
                    return [$C, "ne"];
                }
            }   
            
            $prime = False;

        }
    }

    function getLCMvalues()
    {
        //zadani: Largest Common Multiple dvou cisel
        $A = rand(120, 920); //randon generovani cisel
        $B = rand(120, 920);
        $C = (int)gmp_lcm($A,$B); //vysledek
        return [$A, $B, $C];
    }

    function getGCDvalues()
    {
        //zadani: Greatest Common Divisor dvou cisel
        for ($i = 1; $i<12; $i++)
        { //opakovane generovani cisel (bez nej bude vetsinou $C = 1)
            $A = rand(299, 1501); //random generovana cisla
            $B = rand(299, 1501);
            $C = (int)gmp_gcd($A,$B); //vysledek

            if ($C != 1 and $C != 2 and $C != 3) 
            { //smycka se prerusi kdyz $C != 1/2/3
                break;
            } 
        }
        return [$A, $B, $C];
    }

    function getMODvalues()
    {
        //zadani: n = x mod m
        $A = rand(2542, 124515); //nahodne, velke cislo n
        $B = rand(15, 99); //nahodne cislo m
        $C = $A % $B; //vysledek x

        return [$A, $B, $C];
    }

    function getCONvalues()
    {
        //zadani: a ≡ b mod c

        $random = rand(1,2); //slouzi k vyberu kongruentni / NEkongruentni
        //podle vyberu se nastavi operand $congruent na True / False

        if ($random == 1) 
        {
            //kongruentni
            $C = rand(3, 60); //C

            $X = rand(7, 25);
            $Y = rand(25, 50);
            $Z = rand(3, 23);

            $A = ($C * $X) + $Z; //A
            $B = ($C * $Y) + $Z; //B

            // $congruent = True;
            return [$A, $B, "ano"];
        } 
        else 
        {
            //NEkongruentni
            $C = rand(3, 60); //C
            $X = rand(7, 25);
            $Y = rand(25, 50);

            $Z = rand(3, 23);

            $A = ($C * $X) + $Z; //A
            $B = ($C * $Y); //B

            //  $congruent = False;
            return [$A, $B, "ne"];
        }
    }

    function getDHvalues()
    {
        //zadani: vypocet klice DH protokolu pri zadanych hodnotach p, g, a, b
        //nevim jak overit, ze g je opravdu generatorem Zp*, tudiz jsem to zacyklil s mrdou podminek, aby to proste fungovalo
        for ($i=1; $i=10000; $i++) 
        {
            $p = intval(gmp_nextprime(rand(10, 96))); //random zvolene p, g
            $g = intval(rand(2, $p - 1));
            
            $a = intval(rand(2, $p - 1)); //na random zvolene a, b
            $b = intval(rand(2, $p - 1));
            
            $A = intval(pow($g, $a) % $p); //vypocet A, B
            $B = intval(pow($g, $b) % $p);
            
            $KA = intval(pow($B, $a) % $p); //vypocet klice
            $KB = intval(pow($A, $b) % $p);
            
            if ($A > 1 and $a != $b and $KA > 1 and $KA != $A and $KA == $KB) 
                return [$p, $g, $a, $b, $A, $B];
        }
    }
} 
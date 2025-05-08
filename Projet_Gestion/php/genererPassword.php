
<?php

    function genererPassword($taille = 8) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@&#_';
        $chaine = '';
        $max = strlen($caracteres) - 1;

        for ($i = 0; $i < $taille; $i++) {
            $chaine .= $caracteres[random_int(0, $max)];
        }

        return $chaine;
    }   

    $pass = genererPassword(8);
    echo $pass;
?>
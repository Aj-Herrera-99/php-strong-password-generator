<?php
function generatePassword(int $length, bool $with_repetition): string
{
    if ($length <= 0) return "Nessun parametro valido inserito";

    // possibili caratteri di una password
    $lc_letters = 'abcdefghijklmnopqrstuvwxyz';
    $uc_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $symbols = '!$%&?@#+';

    $pswd_chars =
        $lc_letters .
        $uc_letters .
        $numbers .
        $symbols;

    // inizializzazione password (array)
    $password = [];

    if ($with_repetition) {
        // password ha lunghezza non piu grande di $length
        while (count($password) < $length) {
            // random char tramite metodo rand
            $rand_char = $pswd_chars[rand(0, strlen($pswd_chars) - 1)];
            // pusho rand_char in $password
            array_push($password, $rand_char);
        }
    } else {
        while (count($password) < $length) {
            $rand_char = $pswd_chars[rand(0, strlen($pswd_chars) - 1)];
            // se NO ripetizioni, tolgo da $pswd_chars il char appena assegnato
            $pswd_chars = str_replace($rand_char, "", $pswd_chars);
            array_push($password, $rand_char);
        }
    }

    return implode($password);  // array to string
}
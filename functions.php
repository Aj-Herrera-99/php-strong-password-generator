<?php
function generatePassword($length): string
{
    if ($length <= 0) return "Nessun parametro valido inserito";
    $lc_letters = 'abcdefghijklmnopqrstuvwxyz';
    $uc_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $symbols = '!$%&?@#+';

    $pswd_chars = [
        $lc_letters,
        $uc_letters,
        $numbers,
        $symbols
    ];

    $password = [];
    while (count($password) < $length) {
        $rand_pos = rand(0, count($pswd_chars) - 1);
        $rand_char = rand(0, strlen($pswd_chars[$rand_pos]) - 1);
        $curr_char = $pswd_chars[$rand_pos][$rand_char];
        array_push($password, $curr_char);
    }


    return implode($password);
}

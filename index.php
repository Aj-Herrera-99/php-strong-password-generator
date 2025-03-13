<?php
require_once './functions.php';
session_start();

if (isset($_GET['pswd-len']) && is_numeric($_GET['pswd-len']) && (int) $_GET['pswd-len'] >= 8 && (int) $_GET['pswd-len'] <= 70) {

    $length = (int) $_GET['pswd-len'];

    $with_repetition = true;
    if (isset($_GET['repetition']) && $_GET['repetition'] == "no") {
        $with_repetition = false;
    }

    $with_letters = true;
    if (!isset($_GET['letters']) || (isset($_GET['letters']) && $_GET['letters'] != "on")) {
        $with_letters = false;
    }
    $with_numbers = true;
    if (!isset($_GET['numbers']) || (isset($_GET['numbers']) && $_GET['numbers'] != "on")) {
        $with_numbers = false;
    }
    $with_symbols = true;
    if (!isset($_GET['symbols']) || (isset($_GET['symbols']) && $_GET['symbols'] != "on")) {
        $with_symbols = false;
    }


    if ($with_letters || $with_letters || $with_symbols) {
        $_SESSION['password'] = generatePassword($length, $with_repetition, $with_letters, $with_numbers, $with_symbols);
        header('Location: ./result.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <title>Strong Password Generator</title>
</head>

<body class="min-h-screen bg-[#001731]">
    <h1 class="text-4xl mt-8 mb-4 text-center text-slate-400 font-semibold capitalize">strong password generator</h1>
    <h2 class="text-3xl text-center text-white font-semibold">Genera una password sicura</h2>
    <main>

        <!-- form -->
        <form method="GET" class="bg-white rounded-md p-4 my-2 max-w-lg mx-auto space-y-4">
            <div class="flex justify-between items-center">
                <label for="pswd-len">Lunghezza password:</label>
                <input id="pswd-len" name="pswd-len" class="p-2 rounded-sm border border-slate-400" type="number"
                    min="8" max="70" value="8">
            </div>
            <div class="flex justify-between">
                <p>Consenti ripetizioni di uno o più caratteri:</p>
                <div class="flex flex-col">
                    <div class="flex items-center gap-1">
                        <input id="repetition-yes" name="repetition" type="radio" value="yes" checked>
                        <label for="repetition-yes">Sì</label>
                    </div>
                    <div class="flex items-center gap-1">
                        <input id="repetition-no" name="repetition" type="radio" value="no">
                        <label for="repetition-no">No</label>
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <div></div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-1">
                        <input id="letters" name="letters" type="checkbox" checked>
                        <label for="letters">Lettere</label>
                    </div>
                    <div class="flex items-center gap-1">
                        <input id="numbers" name="numbers" type="checkbox" checked>
                        <label for="numbers">Numeri</label>
                    </div>
                    <div class="flex items-center gap-1">
                        <input id="symbols" name="symbols" type="checkbox" checked>
                        <label for="symbols">Simboli</label>
                    </div>
                </div>
            </div>

            <div>
                <button class="py-1 px-4 rounded-sm bg-blue-500 text-white cursor-pointer hover:bg-blue-600"
                    type="submit">Invia</button>
                <button class="py-1 px-4 rounded-sm bg-zinc-500 text-white cursor-pointer hover:bg-zinc-600"
                    type="reset">
                    Annulla</button>
            </div>
        </form>
    </main>

</body>

</html>
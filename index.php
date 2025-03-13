<?php
require_once './functions.php';
session_start();

if (isset($_GET['pswd-len']) && is_numeric($_GET['pswd-len']) && (int) $_GET['pswd-len'] > 0 && (int) $_GET['pswd-len'] <= 100) {
    $with_repetition = true;
    if (isset($_GET['repetition']) && $_GET['repetition'] == "no"){
        $with_repetition = false;
    }
    $_SESSION['password'] = generatePassword((int) $_GET['pswd-len'], $with_repetition);

    header('Location: ./result.php');
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
                    min="1" max="100">
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
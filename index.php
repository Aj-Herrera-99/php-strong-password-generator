<?php require_once './functions.php' ?>

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
    <main class="max-w-2xl mx-auto">

        <!-- output -->
        <div class="my-2 p-4 bg-cyan-100 rounded-md text-cyan-800">
            <?php echo (isset($_GET['pswd-len']) && is_numeric($_GET['pswd-len'])) ? generatePassword((int) $_GET['pswd-len']) : "Nessun parametro valido inserito" ?>
        </div>

        <!-- form -->
        <form action="index.php" class="bg-white rounded-md p-4">
            <div class="flex justify-between items-center">
                <label for="pswd-len">Lunghezza password:</label>
                <input id="pswd-len" name="pswd-len" class="p-2 rounded-sm border border-slate-400" type="number"
                    min="1" max="100">
            </div>

            <button class="py-1 px-4 rounded-sm bg-blue-500 text-white cursor-pointer hover:bg-blue-600 "
                type="submit">Invia</button>
        </form>
    </main>

</body>

</html>
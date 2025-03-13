<?php
session_start();
if (!isset($_SESSION["password"])) {
    header('Location: ./index.php');
}

$password = $_SESSION["password"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <title>Risultato password</title>
</head>

<body class="min-h-screen bg-[#001731]">
    <main class="max-w-2xl mx-auto flex">
        <div class="mt-16 mx-auto p-4 bg-cyan-100 rounded-md text-cyan-800">
            <p>La tua password generata è:
            </p>
            <span><?php echo $password ?></span>
        </div>
    </main>
</body>

</html>
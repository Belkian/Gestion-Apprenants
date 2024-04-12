<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com" defer></script>
    <script src="<?php HOME_URL ?>JS/script.js" defer></script>
    <title>Document</title>

</head>

<body class="h-screen ">


    <header id="header" class="h-12 flex justify-between bg-gray-100 w-full items-center *:mx-3 *:text-lg">
        <button class="font-semibold" onclick="Accueil()">SIMPLON</button>
        <button id="btnCo" onclick="Connexion()" class="font-medium">Connexion</button>
    </header>
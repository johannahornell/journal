<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Your Personal Journal</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500|Roboto+Slab:300,400|Bubbler+One" rel="stylesheet"><!-- Denna rad kommer resultera i ett felmeddelande vid validering på https://validator.w3.org/, men då koden är tagen från Google Fonts, där det står att det ska skrivas på detta sätt, kan jag inte göra något åt det -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

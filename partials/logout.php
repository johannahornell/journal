<?php

//Avslutar sessionen
session_start();
session_destroy();

//Skickas tillbaka till login sidan
header('Location: ../index.php');
?>

<?php

//Skapar anslutning till databasen
$db = new PDO(
  "mysql:host=localhost;dbname=journal;charset=utf8",
  "root",
  "root",
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]
);

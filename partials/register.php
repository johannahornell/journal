<?php

//Skickar användaren till inloggningssidan efter registrering
header('Location: ../index.php');

require_once 'database.php';

//Hashar lösenordet och sparar i en variabel
$hashed = password_hash($_POST["password"], PASSWORD_BCRYPT);

$registerUser = $db->prepare(
  "INSERT INTO users
  (username, password)
  VALUES (:username, :password)"
);

/* Skickar med användarnamn som skrivits in
och det hashade lösenordet */
$registerUser->execute([
  ":username" => $_POST["username"],
  ":password" => $hashed
]);

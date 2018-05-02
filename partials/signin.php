<?php

require_once 'session_start.php';
require_once 'database.php';

//Väljer användare från databasen
$getUser = $db->prepare(
  "SELECT * FROM users
  WHERE username = :username"
);

//Skickar med användarnamnet som skrivits in
$getUser->execute([
  "username" => $_POST["username"]
]);

//Hämtar rätt användare
$user = $getUser->fetch();

//Kollar att lösenordet som skrivs in stämmer överens med användarens lösenord
if (password_verify($_POST["password"], $user["password"])) {

    //Skickas till sidan med användarens innehåll
    header('Location: ../home_page.php');

    //Samlar information om sessionen och användaren
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $user["username"];
    $_SESSION["userID"] = $user["userID"];
    $_SESSION['sessionActive'] = time(); //Tid för senast aktiv
    $_SESSION['sessionExpire'] = 1800; //Sessionen upphör efter 30 minuter av inaktivitet
}
else {

     //Är användarnamn eller lösenord fel skickas användaren tillbaka startsidan med ett felmeddelande
     $message = "Your email or password is incorrect";
     header("Location:../index.php?message=$message");
}

<?php

require_once 'session_start.php';
require_once 'database.php';

//Laddar om sidan när ett nytt inlägg skapas
header('Location: ../home_page.php');

//Skapar ett datum då inlägget skapas
$date = date('Y-m-d H:i:s');

//Lägger till innehållet i entries
$postEntry = $db->prepare(
  "INSERT INTO entries
  (title, content, createdAt, userID)
  VALUES (:title, :content, :createdAt, :userID)"
);

//Gör det möjligt att ha linebreaks i inläggen
$postContent = $_POST["content"];
$remove_character = array("\r\n");
$postContent = str_replace($remove_character, '<br/>', $postContent);

/* Skickar med det som användaren skrivit in,
 datumet som skapas samt id för inloggad användare */
$postEntry->execute([
  ":title" => $_POST["title"],
  ":content" => $postContent,
  ":createdAt" => $date,
  ":userID" => $_SESSION["userID"]
]);

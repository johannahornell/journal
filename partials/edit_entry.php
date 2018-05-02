<?php

require_once 'session_start.php';
require_once 'database.php';

header('Location: ../home_page.php');

//Hämtar id från inlägget
$id = $_POST['entryID'];

//Gör det möjligt att ha linebreaks i inläggen
$postContent = $_POST["content"];
$remove_character = array("\r\n");
$postContent = str_replace($remove_character, '<br/>', $postContent);

//Uppdaterar titel och innehåll för inlägget
$updateEntries = $db->prepare(
  "UPDATE entries
  SET title = :title, content = :content
  WHERE entryID = :entryID"
);

$updateEntries->execute([
  "title" => $_POST["title"],
  "content" => $postContent,
  "entryID" => $id
]);

?>

<?php

require_once 'session_start.php';
require_once 'database.php';

//Kollar om delete knappen har blivit tryckt
if(isset($_POST['deleteBtn'])){

//Hämtar id från inlägget
 $id = $_POST['entryID'];

 //Tar bort inlägget som användaren klickat på
 $statement = $db->prepare(
   "DELETE FROM entries
   WHERE entryID = $id"
 );
 $statement->execute();

//Läser in sidan igen
 header('Location: ../home_page.php');
 }

?>

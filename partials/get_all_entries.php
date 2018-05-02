<?php

require_once 'session_start.php';
require_once 'database.php';

/* Hämtar alla inlägg från användaren och
sorterar dem efter nyast först */
$getEntries = $db->prepare(
  "SELECT * FROM entries
  WHERE userID = :userID
  ORDER BY entryID DESC"
);

$getEntries ->execute([
  "userID" => $_SESSION["userID"]
]);

$entries = $getEntries ->fetchAll();

/* För varje inlägg skapas ett article element
med allt innehåll */
foreach ($entries as $entry) {

    $entryTitle = $entry['title'];
    $entryContent = $entry['content'];

    //Gör det möjligt att använda quotes i inläggen
    $entryContent = str_replace("'", "&#039;", $entryContent);
    $entryContent = str_replace('"', '\"', $entryContent);
    $entryTitle = str_replace("'", "&#039;", $entryTitle);
    $entryTitle = str_replace('"', '\"', $entryTitle);

    echo '<article class="content">
        <h1 class="post-title">' . $entry['title'] . '</h1>
        <p><i>' . $entry['createdAt'] . '</i></p>
        <p>' . $entry['content'] . '</p>

        <button onclick=\'fillForm(' . $entry['entryID'] . ', "' . $entryTitle . '", "' . $entryContent . '")\' class="edit-delete"><i class="fa fa-edit"></i> Edit</button>

        <form name="delete" action="partials/delete_entry.php" method="post">
            <input type="hidden" name="entryID" value="' . $entry['entryID'] . '">
            <label for="deleteBtn"><i class="fa fa-close"></i></label>
            <input type="submit" name="deleteBtn" value="Delete" class="edit-delete">
        </form>
    </article>';
}

 ?>

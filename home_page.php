<?php require 'partials/head.php';

//Om användaren inte är inloggad skickas man till sidan för att logga in
if(!isset($_SESSION["loggedIn"])) {
     header('Location: index.php');
}
else {
    $now = time();
    //Kollar om tiden nu minus senast aktivitet är större än tiden då sessionen ska upphöra
    if ($_SESSION['sessionExpire'] < $now - $_SESSION['sessionActive']) {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
    //Uppdaterar tiden för senast aktivitet till nu 
    else {
	     $_SESSION['sessionActive'] = $now;
	  }
}

//Om anvädaren är inloggad får den tillgång till sidan
if (isset($_SESSION["loggedIn"])): ?>

    <nav class="navigation">
        <div class="navigation-content">
            <div class="logo">
                <h1><span class="hide-phone">Your Personal</span> Journal</h1>
            </div>
        </div>
        <div class="nav-list">
            <ul>
                <li><i class="fa fa-user-o"></i> <?php echo $_SESSION["username"] ?> </li>
                <li><a href="partials/logout.php">Log out</a></li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <aside class="sidebar">
            <div class="sidebar-column dark">
                <h2>Welcome</h2>
                <hr/>
                <p>This is your personal journal. Here you can write whatever is on your mind.</p>
                <button onclick="showAllPosts()" class="button">View All Posts</button>
                <button onclick="showCreatePost()" class="button">Create New Post</button>
            </div>
        </aside>

        <section class="content-wrapper">
            <div class="post-wrapper" id="post-wrapper">
              <!-- Hämtar in användarens inlägg -->
              <?php require_once 'partials/get_all_entries.php'; ?>
            </div>
            <div class="content create-post" id="create-post">
                <h1>Create post</h1>
                <form action="partials/post_entry.php" method="post">
                    <input type="text" placeholder="Title" name="title" maxlength="100" required>
                    <textarea name="content" maxlength="1000" id="post-content" required></textarea>
                    <br/>
                    <input type="submit" value="Save" class="button"/>
                </form>
            </div>
            <div class="content edit-post" id="edit-post">
                <h1>Edit post</h1>
                <form action="partials/edit_entry.php" method="post">
                    <input type="text" placeholder="Title" name="title" maxlength="100" id="edit-title" required>
                    <textarea name="content" maxlength="1000" id="edit-content" required></textarea>
                    <input type="hidden" name="entryID" id="entry-id">
                    <br/>
                    <input type="submit" value="Update" class="button"/>
                </form>
            </div>

        </section>
    </div>

    <?php endif; ?>

<?php require 'partials/footer.php';?>

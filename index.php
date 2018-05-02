<?php require_once 'partials/head.php'; ?>

    <nav class="navigation">
        <div class="navigation-content">
            <div class="logo">
                <h1><span class="hide-phone">Your Personal</span> Journal</h1>
            </div>
        </div>
        <div class="nav-list">
            <ul>
                <li><a onclick="showSignIn()">Sign in</a></li>
                <li><a onclick="showRegister()">Register</a></li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <aside class="sidebar">
            <section class="sidebar-column light">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <form action="partials/signin.php" method="POST" id="signin">
                        <h1>Sign in</h1>
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <input type="submit" value="Sign in" class="button">
                </form>
                <form action="partials/register.php" method="POST" class="register" id="register">
                        <h1>Register</h1>
                        <input type="text" placeholder="Username" name="username" maxlength="50" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <input type="submit" value="Register" class="button">
                </form>
                <!-- Visar felmeddelande om inloggning misslyckas -->
                <p class="error-message" id="error-message">
                    <?php if(isset($_GET['message']))
                        echo $_GET['message'];
                    ?>
                </p>
            </section>
        </div>
    </div>

<?php require 'partials/footer.php';?>

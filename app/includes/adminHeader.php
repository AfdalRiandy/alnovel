<header>
    <!-- Navbar Menu -->
    <a class="logo" href="<?php echo BASE_URL . '/index.php' ?>">
        <h1 class="logo-text"><span>Al</span>Novel</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="navbar">
        <?php if (isset($_SESSION['Username'])): ?>
        <li>
            <a href="#">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['Username']; ?>
                <i class="fa fa-chevron-down" style="font-size: 0.8em"></i>
            </a>
            <ul>
                <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">logout</a></li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
    <!-- Navbar Menu END-->
</header>
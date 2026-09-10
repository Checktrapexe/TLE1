<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="navTogether">
    <div id="logo">
        <a href="/index.php">
            <img src="media/placeholder.png"
                 alt="MediPod logo">
        </a>
    </div>

    <div class="navText">
        <a href="/index.php">Information</a>

        <?php if (isset($_SESSION['user_id'])) : ?>

            <a href="/pages/general/generate.php">Overview</a>
            <a href="/pages/user/logout.php">Log out</a>

        <?php else : ?>

            <a href="/pages/user/login.php">Login</a>
            <a href="/pages/user/register.php">Register</a>

        <?php endif; ?>

    </div>
</div>
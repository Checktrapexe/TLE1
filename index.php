<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    header("Location: pages/general/generate.php");
    exit;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>MediPod</title>
    <link rel="icon" type="image/x-icon" href="/media/favicon.gif">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav>
    <!-- imports the navigation component-->
    <?php require_once "components/nav.php"; ?>
</nav>

<main>

    <header>

        <img class="medipod" src="media/placeholder.png" alt="MediPod">

        <section id="together">
            <h1 class="indexHeader">MediPod</h1>
            <p>Your portable doctor. Generate pharmaceutical items at the click of a button and receive immediate
                support. Our built-in AI assistant is more than happy to help you with your MediPod journey.</p>
        </section>

    </header>

    <section class="benefitSection">
        <h2>Choose the Future</h2>
        <p>MediPod is the future of the medical field: with constant support from financial backers and professionals
            from the field we strive to improve your quality of life. Many functions with our specially designed MediPod
            can replace a trip to the doctor's, meaning more convenience for you.</p>
    </section>

    <section class="signupSection">
        <h3>Sign up or log in</h3>
        <div class="formButtons">
            <a href="/pages/user/register.php">
                <button>Register</button>
            </a>

            <a href="/pages/user/login.php">
                <button>Log in</button>
            </a>
        </div>
    </section>

</main>

<footer>
    <!--imports the footer component-->
    <?php require_once "components/footer.php"; ?>
</footer>

</body>
</html>
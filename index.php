<?php

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
            <p>description</p>
        </section>

    </header>

    <section class="benefitSection">
        <h2>some stuff idk</h2>
        <p>more stuff</p>
    </section>

    <section class="signupSection">
        <h3>Sign up or log in</h3>
        <div class="formButtons">
            <button>Register</button>
            <button>Log in</button>
        </div>
    </section>

</main>

<footer>
    <!--imports the footer component-->
    <?php require_once "components/footer.php"; ?>
</footer>

</body>
</html>
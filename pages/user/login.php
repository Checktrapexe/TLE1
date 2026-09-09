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
    <script src="https://kit.fontawesome.com/2dba62d6df.js" crossorigin="anonymous"></script>
</head>

<body>

<nav>
    <!-- imports the navigation component-->
    <?php require_once "components/nav.php"; ?>
</nav>

<!-- check if user is logged in, if so show a message like this-->
<?php //if ($login) { ?>
<!--    <p>You're already logged in!</p>-->
<!--    <p><a href="logout.php">Log out</a> / <a href="index.php">Back to home</a></p>-->
<?php //} else { ?>
<!--if not logged in =-->
<main>

    <article>
        <section>
            <h1>Log in</h1>

            <form action="" method="post">

                <div class="inputField">
                    <!-- email label-->
                    <div>
                        <label for="email">E-mail</label>
                    </div>

                    <!-- email input field-->
                    <div>
                        <div>
                            <input type="text" name="email" id="email"
                                   value="<?= htmlentities($email ?? '') ?>">
                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                        </div>
                        <!--  warning under field-->
                        <p class="warning">
                            <?= $errors['email'] ?? '' ?>
                        </p>
                    </div>
                </div>

                <div class="inputField">
                    <!-- password label-->
                    <div>
                        <label for="password">Password</label>
                    </div>

                    <!-- password input field-->
                    <div>
                        <div>
                            <input class="password" id="password" type="password" name="password"/>
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

                            <?php if (isset($errors['loginFailed'])) { ?>
                                <div>
                                    <button class="delete"></button>
                                    <?= $errors['loginFailed'] ?>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- warning under field-->
                        <p class="warning">
                            <?= $errors['password'] ?? '' ?>
                        </p>
                    </div>
                </div>

                <div class="buttonsLogin">
                    <button type="submit" name="submit">
                        Log in with your E-mail
                    </button>

                    <button>
                        <a href="register.php">Register</a>
                    </button>
                </div>

            </form>
        </section>

    </article>

</main>

<!--closing the php tag from the earlier elseif statement-->
<?php //} ?>

<footer>
    <!--imports the footer component-->
    <?php require_once "components/footer.php"; ?>
</footer>

</body>
</html>
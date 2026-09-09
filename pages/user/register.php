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
    <!--imports the navigation component-->
    <?php require_once "components/nav.php"; ?>
</nav>

<main>

    <article>
        <section>
            <h1>Register</h1>

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
                        Create account
                    </button>

                    <button>
                        <a href="register.php">Log in</a>
                    </button>
                </div>

            </form>
        </section>

    </article>

</main>

<footer>
    <!--imports the footer component-->
    <?php require_once "components/footer.php"; ?>
</footer>

</body>
</html>
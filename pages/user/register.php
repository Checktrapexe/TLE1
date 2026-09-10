<?php

session_start();
require_once '../../included/connection.php';

$errors = [];
$login = isset($_SESSION['user_id']);

if (isset($_POST['submit'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validate input
    if ($username === '') {
        $errors['username'] = 'Username is required';
    }

    if ($password === '') {
        $errors['password'] = 'Password is required';
    }

    if (empty($errors)) {

        // Check if username already exists
        $stmt = mysqli_prepare(
                $db,
                "SELECT id FROM users WHERE username = ? LIMIT 1"
        );

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_fetch_assoc($result)) {

            $errors['username'] = 'Username already exists';

        } else {

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $stmt = mysqli_prepare(
                    $db,
                    "INSERT INTO users (username, password) VALUES (?, ?)"
            );

            mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

            if (mysqli_stmt_execute($stmt)) {

                // Log the new user in immediately
                $_SESSION['user_id'] = mysqli_insert_id($db);
                $_SESSION['username'] = $username;

                header("Location: index.php");
                exit;

            } else {
                $errors['registerFailed'] = 'Something went wrong while creating the user.';
            }
        }
    }
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
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://kit.fontawesome.com/2dba62d6df.js" crossorigin="anonymous"></script>
</head>

<body>

<nav>
    <!-- imports the navigation component-->
    <?php require_once __DIR__ . '/../../components/nav.php'; ?>
</nav>

<?php if ($login) { ?>
    <p>You're already logged in!</p>
    <p><a href="logout.php">Log out</a> / <a href="index.php">Back to home</a></p>
<?php } else { ?>

    <main>

        <article>
            <section>
                <h1>Register</h1>

                <form method="post">

                    <div class="inputField">
                        <!-- username label-->
                        <div>
                            <label for="username">Username</label>
                        </div>

                        <!-- username input field-->
                        <div>
                            <div>
                                <input type="text" name="username" id="username"
                                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                            </div>
                            <!-- warning under field-->
                            <p class="warning">
                                <?= htmlspecialchars($errors['username'] ?? '') ?>
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

                                <?php if (isset($errors['registerFailed'])) { ?>
                                    <div>
                                        <button class="delete"></button>
                                        <?= htmlspecialchars($errors['registerFailed']) ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- warning under field-->
                            <p class="warning">
                                <?= htmlspecialchars($errors['password'] ?? '') ?>
                            </p>
                        </div>
                    </div>

                    <div class="buttonsLogin">
                        <button type="submit" name="submit">
                            Create account
                        </button>

                        <button>
                            <a href="login.php">Log in</a>
                        </button>
                    </div>

                </form>
            </section>

        </article>

    </main>

<?php } ?>

<footer>
    <!--imports the footer component-->
    <?php require_once __DIR__ . '/../../components/footer.php'; ?>
</footer>

</body>
</html>
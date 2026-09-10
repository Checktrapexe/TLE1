<?php

session_start();
require_once '../../included/connection.php';


$errors = [];
$login = isset($_SESSION['user_id']);

$redirect = $_GET['redirect'] ?? '/index.php';

if (isset($_POST['submit'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $redirect = $_POST['redirect'] ?? '/index.php';

    // Validate input
    if ($username === '') {
        $errors['username'] = 'Username is required';
    }

    if ($password === '') {
        $errors['password'] = 'Password is required';
    }

    if (empty($errors)) {

        // Prepared statement
        $stmt = mysqli_prepare(
                $db,
                "SELECT id, password FROM users WHERE username = ? LIMIT 1"
        );

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {

            if (password_verify($password, $row['password'])) {

                // Login successful
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $username;

                header("Location: " . $redirect);
                exit;

            } else {
                $errors['loginFailed'] = 'Invalid username or password';
            }

        } else {
            $errors['loginFailed'] = 'Invalid username or password';
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
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/2dba62d6df.js" crossorigin="anonymous"></script>
</head>

<body>

<nav>
    <!-- imports the navigation component-->
    <?php require_once __DIR__ . '/../../components/nav.php'; ?>
</nav>

<?php if ($login) { ?>
    <p>You're already logged in!</p>
    <p><a href="/pages/user/logout.php">Log out</a> / <a href="/index.php">Back to home</a></p>
<?php } else { ?>

    <main>

        <article>
            <section>
                <h1>Log in</h1>

                <form method="post">

                    <input
                            type="hidden"
                            name="redirect"
                            value="<?= htmlspecialchars($redirect) ?>"
                    >

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
                            <!--  warning under field-->
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

                                <?php if (isset($errors['loginFailed'])) { ?>
                                    <div>
                                        <button class="delete"></button>
                                        <?= htmlspecialchars($errors['loginFailed']) ?>
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
                            Log in
                        </button>

                        <button>
                            <a href="/pages/user/register.php">Register</a>
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
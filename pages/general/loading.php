<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MediPod</title>
    <link rel="icon" type="image/x-icon" href="/media/favicon.gif">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .printWrapper {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
            justify-content: center;
            padding-top: 10vw;
            gap: 2vw;
        }

        .loadingBar {
            width: 40vw;
            height: 25px;
            background-color: #313135;
            border: 2px solid #71abcc;
            border-radius: 13px;
            overflow: hidden;
        }

        .loadingBarFill {
            height: 100%;
            width: 0%;
            background-color: #71abcc;
            animation: fillBar 3s linear forwards;
        }

        @keyframes fillBar {
            from {
                width: 0%;
            }
            to {
                width: 100%;
            }
        }

        .printedText {
            display: none;
            font-family: Striker;
            font-size: 2.5rem;
            color: #73a1bd;
        }

        .backButton {
            display: none;
            border-radius: 13%;
            border: 2px solid #73a1bd;
            background-color: #444449;
            color: white;
            padding: 10px 20px;
            font-family: Striker;
            font-size: 1.2rem;
            cursor: pointer;
            text-decoration: none;
        }

        .backButton:hover {
            background-color: #73a1bd;
            color: #444449;
        }
    </style>
</head>

<body>

<nav>
    <?php require_once __DIR__ . '/../../components/nav.php'; ?>
</nav>

<main class="printWrapper">

    <div class="loadingBar" id="loadingBar">
        <div class="loadingBarFill"></div>
    </div>

    <p class="printedText" id="printedText">Printed</p>

    <a href="/pages/general/generate.php" class="backButton" id="backButton">Back</a>

</main>

<footer>
    <?php require_once __DIR__ . '/../../components/footer.php'; ?>
</footer>

<script>
    setTimeout(function () {
        document.getElementById('loadingBar').style.display = 'none';
        document.getElementById('printedText').style.display = 'block';
        document.getElementById('backButton').style.display = 'inline-block';
    }, 3000);
</script>

</body>
</html>
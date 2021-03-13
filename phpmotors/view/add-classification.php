<?php if ($_SESSION['clientData']['clientLevel'] < 2) {  header('location: /phpmotors/');  exit; } ?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content title | PHP Motor</title>

    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>

        <nav class="page_nav">
            <?php echo $navList; ?>
        </nav>

        <main>
        <?php if (isset($_SESSION['clientData']) && !$_SESSION['clientData']['clientLevel'] > 1) {
           include '../index.php';
        } ?>    

        <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/phpmotors/vehicles/index.php" method="post">
                <label for="classificationName"> Classification Name:
                    <input type="text" name="classificationName" id="classificationName" <?php if(isset($classificationName)){echo "value='$classificationName'";}  ?> required>
                </label>

                <br>

                <input type="submit" name="submitbuttom" id="subbtn" value="Submit">
                <input type="hidden" name="action" value="addclassification">

            </form>
        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>
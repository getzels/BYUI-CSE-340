<!DOCTYPE html>
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
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
               }
            ?>
            <form action="/phpmotors/accounts/" method="post">
                <label for="clientEmail"> Email:
                    <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                </label>

                <label for="clientPassword"> Password:</label>
                <span class="info">password is at least 8 characters and has at least 1 uppercase character, 1 number and 1 special character.</span>
                <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                
                <br>

                <input type="submit" name="submitbuttom" id="subbtn" value="login">
                <input type="hidden" name="action" value="login">

                <input onclick="location.href='/phpmotors/accounts/index.php?action=registration'" type="button" value="Create an Account">

            </form>
        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>
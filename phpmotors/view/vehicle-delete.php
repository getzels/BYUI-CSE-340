<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
?><html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Delete $invMake $invModel";
            } ?> | PHP Motors</title>

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

            <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                    echo "Delete $invInfo[invMake] $invInfo[invModel]";
                } elseif (isset($invMake) && isset($invModel)) {
                    echo "Delete$invMake $invModel";
                } ?></h1>

            <form action="/phpmotors/vehicles/index.php" method="post">
                <fieldset>
                    <label for="invMake"> invMake:
                        <input type="text" name="invMake" id="invMake" readonly <?php if (isset($invMake)) {
                                                                                    echo "value='$invMake'";
                                                                                } elseif (isset($invInfo['invMake'])) {
                                                                                    echo "value='$invInfo[invMake]'";
                                                                                } ?>>
                    </label>

                    <label for="invModel"> invModel:
                        <input type="text" name="invModel" id="invModel" readonly <?php if (isset($invModel)) {
                                                                                        echo "value='$invModel'";
                                                                                    } elseif (isset($invInfo['invModel'])) {
                                                                                        echo "value='$invInfo[invModel]'";
                                                                                    } ?>>
                    </label>

                    <label for="invDescription"> invDescription:
                        <textarea name="invDescription" readonly id="invDescription"><?php if (isset($invInfo['invDescription'])) {
                                                                                            echo $invInfo['invDescription'];
                                                                                        } ?></textarea>
                    </label>

                    <br>

                    <input type="submit" class="regbtn" name="submit" value="Delete Vehicle">
                    <input type="hidden" name="action" value="deleteVehicle">
                    <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                    echo $invInfo['invId'];
                                                                } ?>">
                </fieldset>
            </form>
            <p>Confirm Vehicle Deletion. The delete is permanent.</p>
        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>
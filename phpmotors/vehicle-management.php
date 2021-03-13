<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?>
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
            if (isset($message)) {
                echo $message;
            }
            ?>

            <h2>Please select an option</h2>

            <ul>
                <li><a href="/phpmotors/vehicles/index.php?action=addclassification">Add Classification</a></li>
                <li><a href="/phpmotors/vehicles/index.php?action=addVehicle">Add vehicle</a></li>
                <li></li>
            </ul>


            <?php
            if (isset($message)) {
                echo $message;
            }
            if (isset($classificationList)) {
                echo '<h2>Vehicles By Classification</h2>';
                echo '<p>Choose a classification to see those vehicles</p>';
                echo $classificationList;
            }
            ?>
            
            <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
            </noscript>

            <table id="inventoryDisplay"></table>

        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
    <script src="../js/inventory.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>
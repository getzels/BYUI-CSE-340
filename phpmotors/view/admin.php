<?php
    
    if(!isset($_SESSION['loggedin']) || (isset($_SESSION['loggedin']) && !$_SESSION['loggedin'])){
        include 'index.php';
       }
?><!DOCTYPE html>
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
        <h1>logged in</h1> <?php echo $_SESSION['clientData']['clientFirstname']; ?>
        <ul>
        <li>First name: <?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
        <li>Last name: <?php echo $_SESSION['clientData']['clientLastname'] ?></li>
        <li>Email Address: <?php echo $_SESSION['clientData']['clientEmail'] ?></li>
        <li>Client Level: <?php echo $_SESSION['clientData']['clientLevel'] ?></li>
        </ul>

        

        <?php if ($_SESSION['clientData']['clientLevel'] > 1) {

            echo '<p>This user has the grant needed to access the vehicle view <a href="../vehicles/index.php">Vehicle</a> </p>';
        } ?>

        
        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>
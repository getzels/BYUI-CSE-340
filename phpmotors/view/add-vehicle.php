<?php
    $classificationList = '<label for="classification">Choose a classification:';
    $classificationList .= '<select id="classification" name="classification" size="3">';
    foreach($classifications as $classification){
        $classificationList .= "<option value='$classification[classificationId]'";

        if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $classificationList .= ' selected ';
        }
    }
        
        $classificationList .= "> $classification[classificationName] </option>";
    }
    $classificationList .= '</select>';
    $classificationList .= '</label>';
?><?php if ($_SESSION['clientData']['clientLevel'] < 2) {  header('location: /phpmotors/');  exit; } ?><!DOCTYPE html>
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
                <label for="invMake"> invMake:
                    <input type="text" name="invMake" id="invMake" <?php if(isset($invMake)){echo "value='$invMake'";}  ?> <?php if(isset($classificationName)){echo "value='$classificationName'";}  ?> required>
                </label>    

                <label for="invModel"> invModel:
                    <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> required>
                </label>

                <label for="invDescription"> invDescription:    
                    <input type="text" name="invDescription" id="invDescription" <?php if(isset($invDescription)){echo "value='$invDescription'";}  ?>>
                </label>

                <label for="invImage"> invImage:    
                    <input type="text" name="invImage" id="invImage" value="/phpmotors/images/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> required>
                </label>

                <label for="invThumbnail"> invThumbnail:    
                    <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> required>
                </label>

                <label for="invPrice"> invPrice:    
                    <input type="text" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required pattern="[0-9]+(\\.[0-9][0-9]?)?">
                </label>

                <label for="invStock"> invStock:    
                    <input type="text" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required>
                </label>

                <label for="invColor"> invColor:    
                    <input type="text" name="invColor" id="invColor" <?php if(isset($invColor)){echo "value='$invColor'";}  ?> required>
                </label>    

                <?php
                    echo $classificationList;
                ?>

                <br>

                <input type="submit" name="submitbuttom" id="subbtn" value="Submit">
                <input type="hidden" name="action" value="addVehicle">

            </form>
        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>
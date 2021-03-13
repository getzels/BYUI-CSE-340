<?php
$classificationList = '<label for="classification">Choose a classification:';
$classificationList .= '<select name="classificationId" id="classificationId" size="3">';
$classificationList .= "<option>Choose a Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";

    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classificationList .= ' selected ';
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
            $classificationList .= ' selected ';
        }
    }

    $classificationList .= "> $classification[classificationName] </option>";
}
$classificationList .= '</select>';
$classificationList .= '</label>';
?><?php if ($_SESSION['clientData']['clientLevel'] < 2) {
        header('location: /phpmotors/');
        exit;
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
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
                    echo "Modify $invInfo[invMake] $invInfo[invModel]";
                } elseif (isset($invMake) && isset($invModel)) {
                    echo "Modify$invMake $invModel";
                } ?></h1>

            <form action="/phpmotors/vehicles/index.php" method="post">
                <label for="invMake"> invMake:
                    <input type="text" name="invMake" id="invMake" required <?php if (isset($invMake)) {
                                                                                echo "value='$invMake'";
                                                                            } elseif (isset($invInfo['invMake'])) {
                                                                                echo "value='$invInfo[invMake]'";
                                                                            } ?>>
                </label>

                <label for="invModel"> invModel:
                    <input type="text" name="invModel" id="invModel" required <?php if (isset($invModel)) {
                                                                                    echo "value='$invModel'";
                                                                                } elseif (isset($invInfo['invModel'])) {
                                                                                    echo "value='$invInfo[invModel]'";
                                                                                } ?>>
                </label>

                <label for="invDescription"> invDescription:
                    <input type="text" name="invDescription" id="invDescription" <?php if (isset($invDescription)) {
                                                                                        echo "value='$invDescription'";
                                                                                    } elseif (isset($invInfo['invDescription'])) {
                                                                                        echo "value='$invInfo[invDescription]'";
                                                                                    } ?>>
                </label>

                <label for="invImage"> invImage:
                    <input type="text" name="invImage" id="invImage" value="/phpmotors/images/no-image.png" <?php if (isset($invImage)) {
                                                                                                                echo "value='$invImage'";
                                                                                                            } elseif (isset($invInfo['invImage'])) {
                                                                                                                echo "value='$invInfo[invImage]'";
                                                                                                            }  ?> required>
                </label>

                <label for="invThumbnail"> invThumbnail:
                    <input type="text" name="invThumbnail" id="invThumbnail" <?php if (isset($invThumbnail)) {
                                                                                    echo "value='$invThumbnail'";
                                                                                } elseif (isset($invInfo['invThumbnail'])) {
                                                                                    echo "value='$invInfo[invThumbnail]'";
                                                                                }  ?> required>
                </label>

                <label for="invPrice"> invPrice:
                    <input type="text" name="invPrice" id="invPrice" <?php if (isset($invPrice)) {
                                                                            echo "value='$invPrice'";
                                                                        } elseif (isset($invInfo['invPrice'])) {
                                                                            echo "value='$invInfo[invPrice]'";
                                                                        } ?> required pattern="[0-9]+(\\.[0-9][0-9]?)?">
                </label>

                <label for="invStock"> invStock:
                    <input type="text" name="invStock" id="invStock" <?php if (isset($invStock)) {
                                                                            echo "value='$invStock'";
                                                                        } elseif (isset($invInfo['invStock'])) {
                                                                            echo "value='$invInfo[invStock]'";
                                                                        } ?> required>
                </label>

                <label for="invColor"> invColor:
                    <input type="text" name="invColor" id="invColor" <?php if (isset($invColor)) {
                                                                            echo "value='$invColor'";
                                                                        } elseif (isset($invInfo['invColor'])) {
                                                                            echo "value='$invInfo[invColor]'";
                                                                        } ?> required>
                </label>

                <?php
                echo $classificationList;
                ?>

                <br>

                <input type="submit" name="submit" value="Update Vehicle">
                <input type="hidden" name="action" value="updateVehicle">
                <input type="hidden" name="invId" value="
<?php if (isset($invInfo['invId'])) {
    echo $invInfo['invId'];
} elseif (isset($invId)) {
    echo $invId;
} ?>
">

            </form>
        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>
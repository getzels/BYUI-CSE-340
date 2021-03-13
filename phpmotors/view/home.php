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
            <h2>Welcom to PHP Motors!</h2>

            <picture>
                <source srcset="/phpmotors/images/delorean.jpg" media="(min-width: 1025px)">
                <source srcset="/phpmotors/images/delorean-small.jpg">
                <img src="/phpmotors/images/delorean.jpg" alt="img of the delorean for PHP motors">
            </picture>

            <div class="spec">
                <h3>DMC Delorean</h3>
                <ul>
                    <li>3 Cup holders</li>
                    <li>Superman Doors</li>
                    <li>Fuzzy dice!</li>
                </ul>
            </div>

            <img class="own_button" src="/phpmotors/images/site/own_today.png" alt="Own today image for PHP Motors">

            <div class="more_info">


                <div class="upgrade">
                    <h3>Delorean Upgrades</h3>
                    <div class="upgrade_grid">
                        <div class="upgrade_item">
                            <div>
                                <img src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux cap upgrade for delorean" />
                            </div>
                            <a href="#">Flux Capacitor</a>
                        </div>
                        <div class="upgrade_item">
                            <div>
                                <img src="/phpmotors/images/upgrades/flame.jpg" alt="flame upgrade for delorean" />
                            </div>
                            <a href="#">Flux Capacitor</a>
                        </div>
                        <div class="upgrade_item">
                            <div>
                                <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Bumper Sticker upgrade for delorean" />
                            </div>
                            <a href="#">Flux Capacitor</a>
                        </div>
                        <div class="upgrade_item">
                            <div>
                                <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Hub cap upgrade for delorean" />
                            </div>
                            <a href="#">Flux Capacitor</a>
                        </div>
                    </div>
                </div>

                <div class="review">
                    <h3>DMC Delorean Reviews</h3>

                    <ul>
                        <li>"So fast it almost like traveling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling Martin McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day." (4.5/5)</li>
                        <li>"80s livin and I love it!" (5/5)</li>
                    </ul>
                </div>


            </div>

        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>
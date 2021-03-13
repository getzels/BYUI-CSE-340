    <figure class="logo">
        <img src="/phpmotors/images/site/logo.png" alt="logo for php motors web site">
    </figure>

    <div class="account">
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            echo "<a href='/phpmotors/accounts/'><span>Welcome " . $_SESSION['clientData']['clientFirstname'] . " </span></a>";
            echo '<a href="/phpmotors/accounts/index.php?action=Logout" title="Link to account page for PHP Motors">| Log out</a>';
        }else {
            
            echo '<a href="/phpmotors/accounts/index.php?action=login" title="Link to account page for PHP Motors">My Account</a>';            
        } ?>         
    </div>

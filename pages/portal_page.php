<?php include 'inc/header.php'; ?>

<?php
$quoteArray = array(
    "“Wisdom is not a product of schooling but of the lifelong attempt to acquire it.” – Albert Einstein",
    "“Develop a passion for learning. If you do, you will never cease to grow.” – Anthony J. D’Angelo",
    "“You don’t understand anything until you learn it more than one way.” – Marvin Minsky",
    "“In the end we retain from our studies only that which we practically apply.” – Johann Wolfgang Von Goethe"
);
?>

<main class="portalPage position-relative">
    <div class="blackOverlay"></div>
    <div class="page container d-flex align-items-center flex-column justify-content-center" style="height: inherit">
        <div><img src="Assets/img/logo.svg" width="600px" height="300px" style="object-fit:none" alt="logo"></div>
        <div class="text-center text-heading1">Welcome to School's Portal</div>
        <div class="text-center text-subheading1 mb-2"><?php echo $quoteArray[rand(0, count($quoteArray) - 1)]; ?></div>
        <div class="container d-flex justify-content-center align-items-center">
            <a href="pages/login_page.php">
                <div class="buttonPrimary">
                    <span>
                        LOGIN
                    </span>
                </div>
            </a>
            <a href="pages/register_page.php">
                <div class="buttonPrimary">
                    <span>
                        REGISTER
                    </span>
                </div>
            </a>
        </div>
    </div>
</main>
<?php include 'inc/footer.php'; ?>
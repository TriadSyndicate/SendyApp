<?php
//session_start();
$loggedCheck = 0;
if (isset($_SESSION['LoggedIn'])) {
    # code...
    include '../db.php';
    $sql1 = "SELECT * FROM rating_data WHERE driver_id ='$_SESSION[userid]'";
    $result = mysqli_query($conn, $sql1);
    $rating = 0;
    $counter = 0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $counter = $counter + 1;
            $rating = $rating + (int)$row['rating_star'];
        }
    }
    $rating = $rating / $counter;
}
?>
<section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="../assets/images/mbr-122x195.png" alt="Yeet" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="../">Deliveryy..</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
            <?php
                if (isset($_SESSION['LoggedIn'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4">
                        <span class="mbri-star mbr-iconfont mbr-iconfont-btn"></span>
                        Rating (<?php echo $rating; ?>)</a>
                </li><?php } ?>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="./">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home</a>
                </li>
                <?php
                if (isset($_SESSION['LoggedIn'])) {
                ?>
                    <li class="nav-item dropdown"><a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">

                            <?php echo $_SESSION['firstName']; ?></a>
                        <div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="./signout.php"><span class="mbri-logout mbr-iconfont mbr-iconfont-btn"></span>Log Out</a></div>
                    </li> <?php } ?>
            </ul>
            <?php
            if (!isset($_SESSION['LoggedIn'])) {
            ?>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="./login.php"><span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>

                        Sign In</a></div>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="./register.php"><span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>

                        Sign Up</a></div>
            <?php } ?>
        </div>
    </nav>
</section>
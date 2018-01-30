<!--File: News.php-->
<!--Authors: Sara Hoffman and Taylor Kennedy-->
<!--Date: 1-30-18-->

<!--Description: News page for Lutian & Monteleone-->
<!--Contains link to news articles or recent performances-->
<!--along with quote or summary of link content -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lutian & Monteleone</title>
    <link rel="stylesheet" type="text/css" href="basic.css" />
    <link rel="stylesheet" type="text/css" href="news.css" />
    <link rel="icon" href="images/musicNote.png">
</head>
<body>
<div id="container">
<div id="background_image"></div>
<div id="title"><a href="Home.html"><h1>Lutian <span id="amp">&</span> Monteleone</h1></a></div>
<hr>
<div id="nav_bar">
    <ul>
        <li><a href="Home.html">Home</a></li>
        <li><a href="About.html">About</a></li>
        <li><a href="Projects.html">Projects</a></li>
        <li><a href="News.php">News</a></li>
        <li><a href="ContactUs.php">Contact Us</a></li>
    </ul>
</div>

<div id="main">
    <h2>News & Media</h2>
    <p>Click on a link below to read more about recent news and performances!</p>
    <?php
    // get stuff from the db
    try {
        $db = new PDO("mysql:host=localhost;dbname=shoffman", "shoffman", "Hoffdb325");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rows=$db->query("SELECT content,link,source FROM news order by news.id desc;");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($rows->rowCount() !== 0) {
        // if there is news then display quotes and links
        foreach ($rows as $row) {
            $content = $row["content"];
            $content= str_replace("\xe2\x80\x93", '-', $content);
            $link = $row["link"];
            $source = $row["source"];
//            <!--display quotes and links-->
            ?>
            <div class="item"><?php
            if ($source !== null) { ?>
                <h3><a href="<?=$link?>" target="_blank">"<?= $content ?>"</a></h3>
                <p><a href="<?=$link?>" target="_blank">- <?= $source ?></a></p>
                <?php
            } else { ?>
                <h3><a href="<?=$link?>" target="_blank"><?= $content ?></a></h3>
            <?php }
            ?>
            </div>
            <?php
        }
    } else {
        // print that there is no news and to check back later
        ?>
        <p>There is no news at this time! Check back later for updates. :)</p>
        <?php
    }
    ?>

</div>

<div class="footer">
    <div id="footer-column-right" class="footer-column">
        <div class="footer-title">    </div>
        <ul class="sm-list">
            <li><a href="https://www.facebook.com/" target="blank" class="sm-btn" id="facebook-btn">
                <div id="fb-btn-image"><div class="overlay"></div></div></a></li>
            <li><a href="https://www.instagram.com/lostwithyouthemusical/" target="blank" class="sm-btn" id="instagram-btn">
                <div id="ig-btn-image"><div class="overlay"></div></div></a></li>
            <li><a href="https://www.twitter.com/" target="blank" class="sm-btn" id="twitter-btn">
                <div id="tw-btn-image"><div class="overlay"></div></div></a></li>
            <li><a href="https://www.youtube.com/channel/UCXmIWtb8RcNwQuZKYtQzrAA?view_as=subscriber" target="blank" class="sm-btn" id="youtube-btn">
                <div id="yt-btn-image"><div class="overlay"></div></div></a></li>
        </ul>
    </div>
</div>
</div>
</body>
</html>


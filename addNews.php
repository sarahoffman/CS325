<!--File: addNews.html-->
<!--Authors: Sara Hoffman and Taylor Kennedy-->
<!--Date: 1-30-18-->

<!--Description: Page to add news articles to database -->
<!-- for Lutian & Monteleone... not secure. -->

<?php
// get stuff from the form
$content = $_POST["content"];
$link = $_POST["link"];
$source = $_POST["source"];

// strip possible injections and add formatting to show titles
$content = htmlspecialchars($content);
$content = preg_replace('/italics/', '<em>', $content, 1);
$content = preg_replace('/italics/', '</em>', $content, 1);

// check if it is there
if ($content !== null && $link !== null) {
    try {
        // make connection
        $conn = new PDO("mysql:host=localhost;dbname=shoffman", "shoffman", "Hoffdb325");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // if there is a source then insert it
        if ($source !== null && $source !== "") {
            $sql = "INSERT INTO news (content, link, source )
                        VALUES ('$content', '$link', '$source')";
        } else {
            // if there is no source then insert it without one
            $sql = "INSERT INTO news (content, link )
                        VALUES ('$content', '$link')";
        }
        // use exec() because no results are returned
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lutian & Monteleone</title>
    <link rel="stylesheet" type="text/css" href="basic.css" />
    <link rel="stylesheet" type="text/css" href="addNews.css" />
    <link rel="icon" href="images/musicNote.png">
</head>
<body>
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

<!-- Set main area for form content -->
<div id="main">
    <h2>Add News: Admins Only</h2>
    <!-- Form to enter data for database to add to News page -->
    <form action="addNews.php" method="post">
        Content:<br>
        Type the text you'd like to display in bold on the news page. For show titles you'd like in italics,
        surround the text with italics(texthere)italics. For example: Watch the cast of italicsLost With Youitalics
        perform at Lincoln Center.<br>
        <textarea name="content" rows="5" cols="45" required="required" placeholder="Type content here."></textarea><br>
        Link:<br>
        <input type="text" name="link" placeholder="Type link here." required="required"><br>
        Source:<br>
        <input type="text" name="source" placeholder="Optional: enter publication title here."><br>
        <input type="submit">
    </form>
</div>
</body>
</html>
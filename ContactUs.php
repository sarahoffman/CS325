
<?php

// get stuff from the form
$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$email = $_POST["email"];

//check if it is there
try {
    if ($first_name !== null && $last_name !== null && $email !== null){
        $first_name = htmlspecialchars($first_name);
        $last_name = htmlspecialchars($last_name);
        $conn = new PDO("mysql:host=localhost;dbname=shoffman","shoffman", "Hoffdb325");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO email_list (first_name, last_name, email )
                        VALUES ('$first_name', '$last_name', '$email')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lutian & Monteleone</title>
    <link rel="stylesheet" type="text/css" href="basic.css" />
    <link rel="stylesheet" type="text/css" href="contact.css" />
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
        <li><a href="News.html">News</a></li>
        <li><a href="ContactUs.php">Contact Us</a></li>
    </ul>
</div>

<div id="info">
    <div id="pic"><img src="images/jos-and-katie.jpg"></div>
    <div id="columns">
        <div id="column-left">
            <h2>Get Social</h2>
            Connect with us on social media!<br><br>
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

            <h2>For Professional Inquiries</h2>
            Send the team an email at <a href="mailto:lutian.monteleone@gmail.com">lutian.monteleone@gmail.com</a>.<br>
            Email Katie at <a href="mailto:katelyn.monteleone1@gmail.com">katelyn.monteleone1@gmail.com</a>.<br>
            Email Josua at <a href="mailto:jclutian@gmail.com">jclutian@gmail.com</a>.<br><br>
        </div>

        <div id="column-right">
            <h2>Join Our Mailing List</h2>
            <form action="ContactUs.php" method="post">
                First name:<br>
                <input type="text" name="firstname" placeholder="John" required="required" pattern="^[a-zA-Z]+" title="First name must contain only letters."><br>
                Last name:<br>
                <input type="text" name="lastname" placeholder="Doe" required="required" pattern="^[a-zA-Z]+" title="Last name must contain only letters."><br>
                Email address:<br>
                <input type="text" name="email" placeholder="john@gmail.com" required="required" pattern="^.+@{1}[^\.].*\.[a-z]{2,}" title="You must enter a valid email address."><br>
                <input type="submit">
            </form>
        </div>
    </div>
</div>


<div class="footer">
    <div id="footer-column-right" class="footer-column">
        <div class="footer-title">   </div>
    </div>
</div>
</body>
</html>

<!--File: adminLogin.php-->
<!--Authors: Sara Hoffman and Taylor Kennedy-->
<!--Date: 1-30-18-->

<!--Description: Page to login to addNews.php -->
<!-- for Lutian & Monteleone... not secure. -->

<?php

// start session
session_start();


// array of admin usernames and passwords
$admins = array('katie'=>'1b908e69c96485706095ed1b37bea00a',
                'josua'=>'945b93f37cd9aa702a7380756f44e36a',);

// set variables
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

// check if username and password match, password uses md5 hash
if(!empty($username)){
    // if username and password match
    if($admins[$username] == md5($password)) {
        // start session
        $_SESSION['username'] = $username;
    }
    // if they don't match, give error message
    else{
        echo "<script type='text/javascript'>window.alert('Invalid login');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Lutian & Monteleone</title>
        <link rel="stylesheet" type="text/css" href="basic.css" />
        <link rel="icon" href="images/musicNote.png">
    </head>
    <body>
        <!--Setup background image and navigation bar-->
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
                <!-- if in session, redirect to addNews.php -->
                <?php if($_SESSION['username']){
                    header('Location: addNews.php');
                }?>
                <!-- create form for username and password -->
                <fieldset>
                <legend>Admin Login</legend>
                    <form name="login" method="post">
                    Username:  <input type="text" name="username"><br>
                    Password:  <input type="password" name="password"><br>
                    <input type="submit" name="submit">
                </form>
                </fieldset>
            <br>
        </div>
    </body>
</html>
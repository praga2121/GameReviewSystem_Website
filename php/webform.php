<?php
    $message_sent = false;
    if(isset($_POST['email']) && $_POST
    ['email'] != ''){
        //Validate the email. 
        if(filter_var($_POST['email'],
        FILTER_VALIDATE_EMAIL) ){
            
            //Submit the form.
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message= $_POST['message'];

            $to = "someone@mail.com";
            $body = "";

            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";
            

            $message_sent = true;
        }
        else{
            $invalid_class_name = "form-invalid";
            
        }
  
    }
?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Form</title>
    <link rel="stylesheet" href="../css/webform.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
    </head>

    <body>
        <!--Navigation bar-->
        <link rel="stylesheet" href="../css/style-main.css"/>
        <ul>
        <li><a href="main.php">Game Review</a></li>
        <li><a href="gamerank.php">Ranking</a></li>
        <li style="float: right;"><a class="nav-menu" href="admin panel/login.php">Admin Log-In</a></li>
        <li style="float: right;"><a class="nav-menu" href="login.php">User Login</a></li>
        </ul>


        <!--Featured image-->
        <div class="featured-container-contact">
        <div class="overlay">
        <h1 class="top-intro-header">Contact Us <br> </h1>
        </div>
        </div>
        
            <?php
            if($message_sent):
            ?>

                <h3><br><br>Thanks, We will be in Touch.<br><br></h3>

            <?php
            else:
            ?>
            <div class="container">
                <form action="webform.php" method="POST" class="form">
                    <div class="form-group">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" tabindex="1" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Your Email</label>
                        <input  type="email" 
                        class="form-control <?= $invalid_class_name ?? ""?>" id="email" name="email" placeholder="Your Email Address" tabindex="2" required>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" tabindex="3" required>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn">Send Mail</button>
                    </div>

                </form>
            </div>
            <?php
            endif;
            ?>
            </body>
            
    <footer>
        <link rel="stylesheet" href="../css/style-main.css"/>
            <h3 style="padding: 10px; color: #FFFFFF;"></h3>
            <ul>';
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" 
                src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="fiNcyudO"></script>
            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" 
                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" 
                class="fb-xfbml-parse-ignore" style="float: left;">Share</a></div>
    </footer>

</html>
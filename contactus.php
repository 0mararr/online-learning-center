<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="web2.css">
    <title>Contact us form</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com"><!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet"><!---fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!---icons-->
    <script src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("WEmHWduLqMh87xU-l");
        })();

        function SendMail() {
            var fullNameInput = document.getElementById("fullName");
            var emailInput = document.getElementById("email_id");
            var messageInput = document.getElementById("message");

            var params = {
                from_name: fullNameInput.value,
                email_id: emailInput.value,
                message: messageInput.value
            };

            emailjs.send("service_wdpzd5j", "template_04z9mm8", params)
                .then(function(response) {
                    alert("Success! Status: " + response.status);
                    fullNameInput.value = "";
                    emailInput.value = "";
                    messageInput.value = "";
                })
                .catch(function(error) {
                    console.error("Email sending failed:", error);
                    alert("Email sending failed. Please try again later.");
                });

            return false;
        }
    </script>
</head>
<body>
    <section class="header">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="website.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="coursess.php">Courses</a></li>
                    <li><a href="quiz.php">Quiz</a></li>
                    <li><a href="login.php" >logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="contact-title">
            <h1>Hello</h1><br>
            <h2>How may we help</h2>
        </div>
        <div class="contact-form">
            <form id="contact-form" onsubmit="return SendMail()">
                <input name="name" id="fullName" type="text" class="form-control" placeholder="Your name" required><br>
                <input name="email" id="email_id" type="email" class="form-control" placeholder="Your email" required><br>
                <textarea name="message" id="message" class="form-control" placeholder="Message" rows="4" required></textarea><br>
                <input type="submit" class="form-control submit" value="Send Message">
            </form>
        </div>
    </section>
</body>
</html>
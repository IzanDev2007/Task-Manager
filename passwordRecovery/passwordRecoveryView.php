<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="signup-wrapper">
    <form class="signup-form"  method="POST" id="passwordRecovery" >
        <h2>Password Recovery</h2>
        <p>Please enter your email address so we can send you a verification code.</p>
        <input type="email" name="email" placeholder="Enter your email" required  id="email"/>
        <p class="error"></p>
        <button type="submit">Send Code</button>
    </form>
    <form class="signup-form" method="POST" id="enterCode" style="display: none; flex-direction: column; justify-content: center;align-items: center;">
        <h2>Password Recovery</h2>
        <input type="text" name="verificationCode" placeholder="Code" required id="verificationCode" style=" width: 150px; height: 30px;">

        <button type="submit">Submit</button>
    </form>
    <div id="loader" style="display: none" >
        <div class="spinner"></div>
    </div>
</div>

<script src="../ajax.js"></script>
</body>
</html>
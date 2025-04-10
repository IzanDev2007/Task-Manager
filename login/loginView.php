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
    <form class="signup-form"  method="POST" id="passwordRecovery">
        <h2>LogIn</h2>

        <input type="text" name="username" placeholder="Enter your username" required />

        <input type="password" name="password" placeholder="Enter your password" required />
        <p class="error"></p>
        <button type="submit">Login</button>
        <p id="error" class="error"></p>
        <p class="login-link">You don't have an account? <a href="../signUp/singUpView.php">Sign Up</a></p>
     <a href="../passwordRecovery/passwordRecoveryView.php">Forgot Password?</a>
    </form>
</div>

<script src="../ajax.js"></script>
</body>
</html>
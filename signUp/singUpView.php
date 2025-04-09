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
    <form class="signup-form"  method="POST" id="signUp">
        <h2>Sign Up</h2>

        <input type="text" name="username" placeholder="Enter your username" required />
        <input type="email" name="email" placeholder="Enter your email" required />
        <input type="password" name="password" placeholder="Enter your password" required />
        <input type="password" name="repeat-password" placeholder="Repeat your password" required />

        <button type="submit">Register</button>

        <p class="login-link">Already have an account? <a href="#">Log In</a></p>
    </form>
</div>

<script src="../ajax.js"></script>
</body>
</html>
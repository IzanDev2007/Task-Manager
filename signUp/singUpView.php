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
        <p id="userExistError" class="error"></p>
        <input type="email" name="email" placeholder="Enter your email" required />
        <p id="emailExistError" class="error"></p>
        <input type="password" name="password" placeholder="Enter your password" required />
        <p class="error"></p>
        <input type="password" name="repeat-password" placeholder="Repeat your password" required />
        <p id="passwordNotMachError" class="error"></p>

        <button type="submit">Register</button>

        <p class="login-link">Already have an account? <a href="../login/loginView.php">Log In</a></p>
    </form>
</div>

<script src="../ajax.js"></script>
</body>
</html>
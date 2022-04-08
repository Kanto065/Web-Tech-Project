<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/logIn.css">
    <title>Log in form</title>
</head>

<body>
    <?php
	include '../view/common/header.php';
	?>

    <section class="main-page">

        <img class="backgroung-img-login" src="./images/undraw_sign_in_re_o58h.svg" alt="">

        <div class="back-btn-and-title">
            <h3><a href="../view/landingPage.php">
                    <-Back </a>
            </h3>
            <h2 class="admin-login-text">Admin Log in</h2>
        </div>


        <div class="form-div">
            <form action="../controller/loginAction.php" method="post" novalidate>
                <p class="email label">Email </p>
                <input class="input-field" type="text" id="email" name="email"><?php echo $_SESSION['emailErr'] ?><br>
                <p class="password label">Password </p>
                <input class="input-field" type="password" id="pass" name="pass" minlength="8">
                <?php echo $_SESSION['passErr'] ?>
                <br>
                <input class="login-btn btn" type="submit" value="Log in">
                <a class="forgot-pass" href="../controller/forgetPass.php">Forgotten Password?</a>
                <br>
                <hr>
                <p class="new-admin-label">New Admin? register instead</p>
                <button class="register-btn btn" type="submit" formaction="../view/registration.php">Register</button>

            </form>
        </div>

    </section>

    <?php
	$_SESSION['unameErr'] = $_SESSION['passErr'] = '';
	include '../view/common/footer.php';
	?>
</body>

</html>
<?php 
  session_start();
  error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
  <?php
        include '../view/common/header.php';
    ?>
    <h2>Registration Form</h2>
    <form action="../controller/RegistrationAction.php" method="post" novalidate>
        <fieldset>
          <legend>Basic Information:</legend>
            <label for="fname">First Name: (required)</label><br>
            <input type="text" id="fname" name="fname"> <?php echo $_SESSION['firstNameErr'] ?> <br>
            <label for="lname">Last Name:  (required)</label><br>
            <input type="text" id="lname" name="lname"> <?php echo $_SESSION['lastNameErr'] ?> <br>
            <label for="gender">Select Gender:  (required)</label> <?php echo $_SESSION['genderErr'] ?> <br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label><br><br>
            
        </fieldset>
        <br>
        <fieldset>
          <legend>Contact Information:</legend>
          <label for="present-address">Address:</label><br>
          <textarea name="present-address" id="present-address" cols="30" rows="4"></textarea><br>
          <label for="phone">phone:</label><br>
          <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> <br>
          <label for="email">Email: (required)</label><br>
          <input type="email" id="email" name="email"> <?php echo $_SESSION['emailErr'] ?> <br>
        </fieldset>
        <br>
        <fieldset>
          <legend>Credentials:</legend>
          <label for="uname">User Name: (required)</label><br>
          <input type="text" id="uname" name="uname"> <?php echo $_SESSION['unameErr'] ?> <br>
          <label for="pass">Password: (required) (4 characters minimum):</label><br>
          <input type="password" id="pass" name="pass"> <?php echo $_SESSION['passErr'] ?> <br>
          <label for="cpass">Confirm Password: (required)</label> <br>
          <input type="password" id="cpass" name="cpass"> <?php echo $_SESSION['cpassErr'] ?> <br>
        </fieldset>
        <br>
        <input type="submit" value="Submit">
        <br><br>
        <?php 
          $_SESSION['firstNameErr'] = $_SESSION['lastNameErr'] = $_SESSION['genderErr'] = $_SESSION['emailErr'] = $_SESSION['unameErr'] = $_SESSION['passErr'] = $_SESSION['cpassErr'] = '';
        ?>
        <button type="submit" formaction="../view/landingPage.php"> Go Back to landing page</button>
      </form>
      <?php
        include '../view/common/footer.php';
    ?>
</body>
</html>
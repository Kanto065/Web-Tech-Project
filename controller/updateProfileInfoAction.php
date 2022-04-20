<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update info</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['flag'])) {
        header("Location: ../view/logIn.php");
        exit();
    }

    require_once('../model/adminInfoUpdate.php');

    $firstName2 = $lastName2  = $presentAddr2 = $phone2 = $email2  = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        function sanitize($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $firstName2 = sanitize($_POST['fname']);
        $lastName2 = sanitize($_POST['lname']);
        $presentAddr2 = sanitize($_POST['present-address']);
        $phone2 = sanitize($_POST['phone']);

        if (empty($firstName2) or empty($lastName2) or empty($phone2) or empty($presentAddr2)) {
            echo "Please fill up the form properly";
        } else {

            if (update($firstName2, $lastName2, $phone2, $presentAddr2)) {
                header("Location: ../view/updateProfileInfo.php");
                exit();
            }
        }
    }


    ?>

    <?php
    include '../view/common/footer.php';
    ?>
</body>

</html>
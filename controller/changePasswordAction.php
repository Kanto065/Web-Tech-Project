<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>change password</title>
</head>

<body>
    <?php
	if (!isset($_COOKIE['flag'])) {
		header("Location: ../view/logIn.php");
		exit();
	}
	require_once('../model/database_connection.php');
	require_once('../model/updatePass.php');

	$conn = get_connection();

	$sql =  "SELECT * FROM admin";

	$result = $conn->query($sql);

	if ($result) {
		$data = mysqli_fetch_assoc($result);
		$password = $data['password'];
	}
	?>

    <?php
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		function sanitize($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$pass = sanitize($_POST['pass']);
		$newPass = sanitize($_POST['newPass']);

		if (empty($pass) or empty($newPass)) {
			echo "Please fill up the form properly";
		} else {

			if ($password === $pass) {
				if (updatePass($newPass)) {
					header("Location: ../view/changePassword.php");
					exit();
				}
			} else {
				echo "current password incorrect";
			}
		}
	}
	?>

    <?php
	include '../view/common/footer.php';
	?>
</body>

</html>
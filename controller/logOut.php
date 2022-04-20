<?php
session_destroy();
setcookie('flag', '', time() - 3600, '/');
header("Location: ../view/logIn.php");
<?php
session_start();
$msg = null;
$firstName = null;
$password = null;
//$user === "Jan
//$password === "123456"
if(isset($_POST['btn'])) {
    $firstName = $_POST['user'];
    $password = $_POST['password'];

	$conn = new mysqli("localhost", "root", "", "users_db");
	$sql = "SELECT * FROM users WHERE name = '$firstName'";
	$result = $conn->query($sql);
	$user = $result->fetch_assoc();
	$conn->close();
    if($user != null && password_verify($password, $user["password"])) {
        $_SESSION['user'] = $firstName;
        header('Location: 01.php');
    } else {
        $msg = "Niepoprawne dane logowania";
    }
}
?>

<!doctype html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logowanie</title>
</head>
<body>
<h3>Logowanie</h3>
<a href="register.php">Rejestracja</a>
<form action="" method="post">
	<input type="text" name="user" placeholder="wpisz imię">
	<input type="text" name="password" placeholder="wpisz hasło">
	<button type="submit" name="btn">Zaloguj</button>
</form>
<p><?php echo $msg; ?></p>
</body>
</html>

<?php
session_start();
$msg = null;
$user = null;
$password = null;
//$user === "Jan
//$password === "123456"
if(isset($_POST['btn'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    if($user === "Jan" && $password === "123456") {
        $_SESSION['user'] = $user;
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
<form action="" method="post">
    <input type="text" name="user" placeholder="wpisz imię">
    <input type="text" name="password" placeholder="wpisz hasło">
    <button type="submit" name="btn">Zaloguj</button>
</form>
<p><?php echo $msg; ?></p>
</body>
</html>

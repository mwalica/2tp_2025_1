<?php

$msg = null;
$firstName = null;
$password = null;

if(isset($_POST['btn'])) {
    if(!empty(trim($_POST['user'])) && !empty(trim($_POST['password']))) {
        $firstName = $_POST['user'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $conn = new mysqli("localhost", "root", "", "users_db");
        $sql = "INSERT INTO users (name, password) VALUES ('$firstName', '$password')";
        $conn->query($sql);
        $conn->close();
        header("location: login.php");
    } else {
        $msg = "Prosze wpisać imię i hasło";
    }



}
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rejestracja</title>
</head>
<body>
<h3>Rejestracja</h3>
<form action="" method="post">
    <input type="text" name="user" placeholder="wpisz imię">
    <input type="text" name="password" placeholder="wpisz hasło">
    <button type="submit" name="btn">Zaloguj</button>
</form>
<p><?php echo $msg; ?></p>
</body>
</html>


<?php
session_start();
$firstName = null;
if(isset($_SESSION['user'])) {
    $firstName = $_SESSION['user'];
} else {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strona główna</title>
</head>
<body>
<h3><?php echo $firstName; ?> jest zalogowany.</h3>
<p>Do tej strony jest dostęp tylko jeśli jesteśmy zalogowani</p>
<a href="logout.php">Wyloguj</a>
</body>
</html>

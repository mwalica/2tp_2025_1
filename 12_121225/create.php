<?php
$msg = null;
if(isset($_POST["btn"])) {
    if(!empty(trim($_POST["name"])) && !empty(trim($_POST["city"])) && !empty(trim($_POST["country"]))) {
        $name = $_POST["name"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        //dodawanie nowego rekordu do bazy danych
        $conn = new mysqli("localhost", "root", "", "clubs_db");
        $conn->set_charset("utf8");
        $sql = "INSERT INTO clubs (name, city, country) VALUES ('$name', '$city', '$country')";
        $conn->query($sql);
        $conn->close();
        //przekierowanie do pliku kluby.php
        header("Location: kluby.php");
    } else {
        $msg = "Prosz wypełnić formularz";
    }
}
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dodaj klub</title>
</head>
<body>
<h3>Dodawanie nowego klubu</h3>
<form action="" method="post" autocomplete="off">
    <input type="text" name="name" placeholder="nazwa klubu">
    <input type="text" name="city" placeholder="miasto">
    <input type="text" name="country" placeholder="państwo">
    <button type="submit" name="btn">Dodaj</button>
</form>
<p><?php echo $msg; ?></p>
</body>
</html>

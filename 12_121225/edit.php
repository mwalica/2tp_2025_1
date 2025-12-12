<?php
$id = $_GET['id'];
$msg = null;

$conn = new mysqli("localhost", "root", "", "clubs_db");
$conn->set_charset("utf8");
$sql1 = "SELECT * FROM clubs WHERE id = '$id'";
$result = $conn->query($sql1);
$club = $result->fetch_assoc();

if(isset($_POST['btn'])) {
    if(!empty(trim($_POST['name'])) && !empty(trim($_POST['city'])) && !empty(trim($_POST['country']))) {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $sql2 = "UPDATE clubs SET name = '$name', country = '$country', city = '$city' WHERE id = '$id'";
        $conn->query($sql2);
        $conn->close();
        header("Location: kluby.php");
    } else {
        $msg = "Wszystkie pola formularza powinny być wypełnione";
    }
}

$conn->close();
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edytuj klub</title>
</head>
<body>
<h3>Edycja klubu</h3>
<form action="" method="post" autocomplete="off">
    <input type="text" name="name" placeholder="nazwa klubu" value="<?php echo $club['name']; ?>">
    <input type="text" name="city" placeholder="miasto" value="<?php echo $club['city']; ?>">
    <input type="text" name="country" placeholder="państwo" value="<?php echo $club['country']; ?>">
    <button type="submit" name="btn">Zmień</button>
</form>
<p><?php echo $msg; ?></p>
</body>
</html>

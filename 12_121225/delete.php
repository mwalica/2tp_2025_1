<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "clubs_db");
$sql = "DELETE FROM clubs WHERE id='$id'";
$conn->query($sql);
$conn->close();
header('location: kluby.php');

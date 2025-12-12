<?php
$conn = mysqli_connect("localhost", "root", "", "clubs_db");
$conn->set_charset("utf8");
$sql = "SELECT * FROM clubs ORDER BY city";
$result = $conn->query($sql);
$clubs = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid blue;
            padding: 1em;
        }
        a {
	        text-decoration: none;
	        background-color: #01018a;
	        padding: 0.4em 0.6em;
	        display: inline-block;
	        margin-bottom: 0.6em;
	        margin-right: 0.6em;
	        color: rgba(255, 255, 255, 0.8);
	        border-radius: 5px;
        }
    </style>
    <title>Kluby piłkarskie</title>
</head>
<body>
<h3>Kluby piłkarskie</h3>
<a href="create.php">Dodaj klub</a>
<table>
    <tr>
        <th>Nazwa</th>
        <th>Miasto</th>
        <th>Państwo</th>
	    <th>Akcje</th>
    </tr>
    <?php foreach($clubs as $club) : ?>
    <tr>
        <td><?php echo $club['name']; ?></td>
        <td><?php echo $club['city']; ?></td>
        <td><?php echo $club['country']; ?></td>
        <td>
	        <a href="edit.php?id=<?php echo $club['id']; ?>">Edycja</a>
	        <a href="delete.php?id=<?php echo $club['id']; ?>">Usuń</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
</body>
</html>

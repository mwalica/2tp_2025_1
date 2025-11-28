<?php
//połączenie z baza danych
$conn = mysqli_connect('localhost', 'root', '', 'blog_db');

//ustawienie kodowania znaków
mysqli_set_charset($conn, 'utf8');

//zapytanie w sql
$sql = "SELECT * FROM articles";

//wysyłanie zapytania
$result = mysqli_query($conn, $sql);

//tablica, której elementami są tablice asocjacyjne (rekordy bazy danych)
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

//zamknięcie bazy danych
mysqli_close($conn);

?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid gray;
            padding: 1em;
        }
    </style>
</head>
<body>
<h3>Artykuły</h3>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>tytuł</th>
        <th>data utworzenia</th>
        <th>akcje</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($articles as $article): ?>
    <tr>
        <td><?php echo $article['id']; ?></td>
        <td><?php echo $article['title']; ?></td>
        <td><?php echo $article['created_at']; ?></td>
        <td></td>
    </tr>
    <?php endforeach; ?>

    <?php foreach($articles as $article) {
        echo "<tr>";
        echo "<td>" . $article['id'] . "</td>";
        echo "<td>" . $article['title'] . "</td>";
        echo "<td>" . $article['created_at'] . "</td>";
        echo "<td></td>";
        echo "</tr>";
    }?>
    </tbody>
</table>
</body>
</html>

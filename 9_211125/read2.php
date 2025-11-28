<?php
//połączenie z baza danych
$conn = new mysqli('localhost', 'root', '', 'blog_db');

//ustawienie kodowania znaków
$conn->set_charset("utf8");

//zapytanie w sql
$sql = "SELECT * FROM articles";

//wysyłanie zapytania
$result = $conn->query($sql);

//tablica, której elementami są tablice asocjacyjne (rekordy bazy danych)
$articles = $result->fetch_all(MYSQLI_ASSOC);

//zamknięcie bazy danych
$conn->close();

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
    </tbody>
</table>
</body>
</html>

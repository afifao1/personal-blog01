<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $text = $_POST['text'];

    $stmt = $db->prepare("INSERT INTO posts (title, text) VALUES (:title, :text)");
    $stmt->execute(['title' => $title, 'text' => $text]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new post</title>
</head>
<body>
    <h1>Add new post</h1>
    <form method="post">
        <input type="text" name="title" placeholder="title" required><br>
        <textarea name="text" placeholder="text" required></textarea><br>
        <button type="submit">submit</button>
    </form>
</body>
</html>

<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Post not found!");

$stmt = $db->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) die("Post not found!");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['text'])) ?></p>
    <a href="index.php">Return to homepage</a>
</body>
</html>

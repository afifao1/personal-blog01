<?php
include 'db.php';

$stmt = $db->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Personal Blog</title>
</head>
<body>
    <h1>Personal Blog</h1>
    <a href="create.php">Add new post</a>

    <?php foreach ($posts as $post): ?>
        <h2>
            <a href="post.php?id=<?= $post['id'] ?>">
                <?= htmlspecialchars($post['title']) ?>
            </a>
        </h2>
        <p><?= nl2br(htmlspecialchars(substr($post['text'], 0, 100))) ?>...</p>
        <a href="edit.php?id=<?= $post['id'] ?>">edit</a>
        <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Do you want to delete?')">delete</a>
    <?php endforeach; ?>
</body>
</html>

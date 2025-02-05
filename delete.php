<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $db->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

header("Location: index.php");
?>

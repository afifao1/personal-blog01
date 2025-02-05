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
    <style>
   h1{
    color:red;
    text-align:center
   }
   form{
    width: 50%;
    margin: 0 auto;
   }
   input{
    width: 100%;
    height:30px;
    border:1px solid red;
    border-radius: 6px;
    padding-left:10px;

   }
   
   textarea{
    width: 100%;
    border:1px solid red;
    border-radius: 6px;
    padding-left:10px;
    margin: 20px 0;
   }
   button{
    width: 150px;
    height:35px;
    background-color: red;
    color: white;
   }
    </style>
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

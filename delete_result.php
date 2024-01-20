<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本一覧</title>
</head>
<body>   
<h1>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    require 'db.php';

    if (isset($_POST['selected_books']) && is_array($_POST['selected_books'])) {
        $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516802-final;charset=utf8', 'LAA1516802', 'Pass0605');

        
        foreach ($_POST['selected_books'] as $book_id) {
            $stmt = $pdo->prepare('DELETE FROM book WHERE book_id = ?');
            $stmt->execute([$book_id]);
        }

        echo '削除しました';
    } else {
        echo '選択した本がありません';
    }
} 
?>
</h1>
<?php require 'header.php'; ?>
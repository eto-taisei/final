<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>本登録</h1>
    <?php require 'header.php'; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new PDO($connect, USER, PASS);

        
        $book_name = $_POST['book_name'];
        $sakusya_name = $_POST['sakusya_name'];
        
        $category_id = $_POST['category_id'];

        $sql = $pdo->prepare('INSERT INTO book (book_name, sakusya_name, category_id) VALUES (?, ?, ?)');
        $result = $sql->execute([$book_name, $sakusya_name, $category_id]);


        
        if ($result) {
            echo '登録に成功しました。';
        } else {
            echo '登録に失敗しました。';
        }
    }
    ?>

    <form action='toroku.php' method="post">
        本名<input type="text" name='book_name' required><br>
        作者名<input type="text" name='sakusya_name' required><br>
        カテゴリID<input type="text" name='category_id' required><br> 
        <button type='submit'>登録</button>
    </form>
</body>
</html>

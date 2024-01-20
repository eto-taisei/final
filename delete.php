<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本削除</title>
</head>
<body>
    <h1>本削除</h1>

    <?php require 'header.php'; ?>
    <?php require 'db.php'; ?>

    <form action="delete_result.php" method="post">
        <?php
        $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516802-final;charset=utf8', 'LAA1516802', 'Pass0605');

        
        $query = 'SELECT b.book_id, b.book_name, b.sakusya_name, c.category_name FROM book b
              JOIN category c ON b.category_id = c.category_id
              ORDER BY b.book_id';
        foreach ($pdo->query($query) as $row) {
            echo '<p>';
            echo '<input type="checkbox" name="selected_books[]" value="' . $row['book_id'] . '">';
            echo $row['book_id'], ':';
            echo $row['book_name'], ':';
            echo $row['sakusya_name'], ':';
            echo $row['category_name'];
            echo '</p>';
        }
        ?>

        <input type="submit" value="削除">
    </form>
</body>
</html>

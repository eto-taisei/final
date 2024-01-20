<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function validateForm() {
            var selectedBookId = document.querySelector('input[name="selected_book_id"]:checked');

            if (!selectedBookId) {
                alert('本を選択してください。');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>本一覧</h1>
    <?php require 'header.php'; ?>
    <?php require 'db.php'; ?>
    <form action="kosin2.php" method="post" onsubmit="return validateForm()">
        <?php
            $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516802-final;charset=utf8', 'LAA1516802', 'Pass0605');
            $query = 'SELECT b.book_id, b.book_name, b.sakusya_name, c.category_name FROM book b
            JOIN category c ON b.category_id = c.category_id
            ORDER BY b.book_id';
            foreach ($pdo->query($query) as $row) {
                echo '<label>';
                echo '<input type="radio" name="selected_book_id" value="' . $row['book_id'] . '">';
                echo $row['book_id'] . '：';
                echo $row['book_name'] . '：';
                echo $row['sakusya_name'] . '：';
                echo $row['category_name'];
                echo '</label><br>';
            }
        ?>
        <input type="submit" value="更新">
    </form>
</body>
</html>

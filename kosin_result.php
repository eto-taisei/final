<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本の更新</title>
</head>
<body>
    <h1>本の更新</h1>
    <?php
    require 'header.php';
    require 'db.php';
    
    $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516802-final;charset=utf8', 'LAA1516802', 'Pass0605');
    $selectQuery = 'SELECT b.book_id, b.book_name, b.sakusya_name, c.category_name FROM book b
                        JOIN category c ON b.category_id = c.category_id
                        WHERE b.book_id = :book_id';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['selected_book_id'])) {
            $book_id = $_POST['selected_book_id'];
    
            if (empty($_POST['new_book_name'])) {
                echo '本名を入力してください。';
            } elseif (empty($_POST['new_sakusya_name'])) {
                echo '作者名を入力してください。';
            } elseif (empty($_POST['new_category_id'])) {
                echo 'カテゴリIDを入力してください。';
            } else {
                
                $new_book_name = htmlspecialchars($_POST['new_book_name']);
                $new_sakusya_name = $_POST['new_sakusya_name'];
                $new_category_id = $_POST['new_category_id'];
    

                $sql = $pdo->prepare('UPDATE book SET book_name=?, sakusya_name=?, category_id=? WHERE book_id=?');
    
                if ($sql->execute([$new_book_name, $new_sakusya_name, $new_category_id, $book_id])) {
                    echo '更新に成功しました。';
                } else {
                    echo '更新に失敗しました。';
                }
            }
        } else {
            echo '選択された本がありません。';
        }
    }
    ?>
</body>
</html>
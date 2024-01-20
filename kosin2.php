<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["selected_book_id"])) {
        $selectedBookId = $_POST["selected_book_id"];

        
        $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516802-final;charset=utf8', 'LAA1516802', 'Pass0605');
        $selectQuery = 'SELECT b.book_id, b.book_name, b.sakusya_name, c.category_name FROM book b
                        JOIN category c ON b.category_id = c.category_id
                        WHERE b.book_id = :book_id';
        $stmt = $pdo->prepare($selectQuery);
        $stmt->bindParam(':book_id', $selectedBookId, PDO::PARAM_INT);
        $stmt->execute();

        $selectedBook = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($selectedBook) {
            
            echo '<h2>選択された本の情報</h2>';
            echo '<p>本ID: ' . $selectedBook['book_id'] . '</p>';
            echo '<p>本名: ' . $selectedBook['book_name'] . '</p>';
            echo '<p>作者名: ' . $selectedBook['sakusya_name'] . '</p>';
            echo '<p>カテゴリ名: ' . $selectedBook['category_name'] . '</p>';

           
            echo '<form action="kosin_result.php" method="post">';
            echo '<input type="hidden" name="selected_book_id" value="' . $selectedBook['book_id'] . '">';
            echo '<label for="new_book_name">本名：</label>';
            echo '<input type="text" name="new_book_name" required><br>';
            echo '<label for="new_sakusya_name">作者名：</label>';
            echo '<input type="text" name="new_sakusya_name" required><br>';
            echo '<label for="new_category_id">カテゴリID：</label>';
            echo '<input type="text" name="new_category_id" required><br>';
            echo '<input type="submit" value="更新">';
            echo '</form>';
        } else {
            echo '<p>選択された本の情報が見つかりません。</p>';
        }
    } else {
        echo '<p>本を選択してください。</p>';
    }
}
?>
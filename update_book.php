<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $books = json_decode(file_get_contents('books.json'), true);

    foreach ($books as &$book) {
        if ($book['id'] == $_POST['id']) {
            $book['title'] = $_POST['title'];
            $book['author'] = $_POST['author'];
            $book['isbn'] = $_POST['isbn'];
            $book['stock'] = $_POST['stock'];
            $book['price'] = $_POST['price'];
            break;
        }
    }

    file_put_contents('books.json', json_encode($books));

    header('Location: index.php');
    exit;
}


$books = json_decode(file_get_contents('books.json'), true);

$book_to_update = null;
foreach ($books as $book) {
    if ($book['id'] == $_GET['id']) {
        $book_to_update = $book;
        break;
    }
}

if (!$book_to_update) {
    die('Book not found');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Update Book</h1>
    <form action="update_book.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($book_to_update['id']); ?>">
        <input type="text" name="title" value="<?php echo htmlspecialchars($book_to_update['title']); ?>" required>
        <input type="text" name="author" value="<?php echo htmlspecialchars($book_to_update['author']); ?>" required>
        <input type="text" name="isbn" value="<?php echo htmlspecialchars($book_to_update['isbn']); ?>" required>
        <input type="number" name="stock" value="<?php echo htmlspecialchars($book_to_update['stock']); ?>" required>
        <input type="text" name="price" value="<?php echo htmlspecialchars($book_to_update['price']); ?>" required>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>

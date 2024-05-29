<?php
$books = json_decode(file_get_contents('books.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Book Manager</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book['id']); ?></td>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                <td><?php echo htmlspecialchars($book['stock']); ?></td>
                <td><?php echo htmlspecialchars($book['price']); ?></td>
                <td>
                    <a class="button edit" href="update_book.php?id=<?php echo $book['id']; ?>">Edit</a>
                    <a class="button delete" href="delete_book.php?id=<?php echo $book['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Add a new book</h2>
    <form action="add_book.php" method="post">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="text" name="isbn" placeholder="ISBN" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <input type="text" name="price" placeholder="Price" required>
        <button type="submit" class="button add">Add Book</button>
    </form>
</body>
</html>

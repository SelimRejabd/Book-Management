<?php
$books = json_decode(file_get_contents('books.json'), true);

$new_book = [
    'id' => uniqid(),
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'isbn' => $_POST['isbn'],
    'stock' => $_POST['stock'],
    'price' => $_POST['price']
];

$books[] = $new_book;

file_put_contents('books.json', json_encode($books));

header('Location: index.php');
?>

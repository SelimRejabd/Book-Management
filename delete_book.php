<?php

$books = json_decode(file_get_contents('books.json'), true);


$books = array_filter($books, function($book) {
    return $book['id'] != $_GET['id'];
});


file_put_contents('books.json', json_encode($books));


header('Location: index.php');
?>

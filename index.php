<?php require __DIR__ . ('/books.php');
if (isset($_GET['author'])) {
    if ($_GET['author'] == 'asc') {
        array_multisort(array_column($books, 'author'), SORT_ASC, $books);
    }
}
if (isset($_GET['year'])) {
    if ($_GET['year'] == 'asc') {
        array_multisort(array_column($books, 'year'), SORT_ASC, $books);
    }
} ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookshelf</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="sorting">
        <h1>Sort by:</h1>
        <p><a href="?author=asc">Author alphabetical</a> </p>
        <p><a href="?year=asc">Publishing Year</a> </p>
    </div>
    <form action="index.php" method="get">
        <label for="freeSearch">Free search:</label>
        <input type="text" name="freeSearch" id="freeSearch">
        <button type="submit">Search</button>
    </form>
    <?php if (isset($_GET['freeSearch'])) {
        $userSearch = $_GET['freeSearch']; ?>
        <h4>Result:</h4>
        <div class="book-display">
            <?php foreach ($books as $book) :
                if (preg_match("/.*($userSearch).*$/i", $book['author'], $matches) || preg_match("/.*($userSearch).*$/i", $book['title'], $matches)) { ?>
                    <div class="book-front isbn<?= $book['isbn'] ?>">
                        <div class="title-front"><?= $book['title'] ?></div>
                        <div class="author-front"><?= $book['author'] ?></div>
                    </div>
            <?php };
            endforeach; ?>
        </div>
    <?php } ?>

    <div class="book-shelf">
        <?php foreach ($books as $book) : ?>
            <div class="book isbn<?= $book['isbn'] ?>">
                <div class="title"><?= $book['title'] ?></div>
                <div class="author"><?= $book['author'] ?></div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="shelf"></div>
</body>

</html>